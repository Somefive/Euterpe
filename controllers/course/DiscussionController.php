<?php
/**
 * Created by PhpStorm.
 */

namespace app\controllers\course;

use app\models\account\User;
use app\models\course\Courseenrollment;
use app\models\course\NewPostForm;
use app\models\course\Post;
use app\models\course\Remind;
use app\models\course\ReplyPostForm;

use yii\web\Controller;
use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
class DiscussionController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index.php');
    }
    //讨论区的主页面
    public function actionDiscussion()
    {

        $allUsername = User::getAllUsername();
        $simplePosts = Post::getSimplePosts();
        $RemindDatas = Remind::getRemindedData(User::getAppUserID());
        $ReplyDatas = Remind::getReplyedAData(User::getAppUserID());
        $talkDatas=Remind::getReplyedBData(User::getAppUserID());
        $remindedNum=0;
        $replyNum=0;
        $talkNum=0;
        $Remind=array();
        foreach ($RemindDatas as $RemindedPostId => $RemindData) {
            foreach ($RemindData as $RemindManId => $RemindPostId) {
                $RemindManName = User::getUsernameById($RemindManId);
                $RemindPost = Post::find()->where(['postId' => $RemindPostId])->asArray()->one();
                $simpleInfo = strip_tags(substr(ArrayHelper::getValue($RemindPost, 'content'), 0, 100));
                $Remind[] = ['RemindedPostId' => $RemindedPostId, 'RemindManName' => $RemindManName, 'simpleInfo' => $simpleInfo, 'RemindPostId' => $RemindPostId, 'time' => ArrayHelper::getValue($RemindPost, 'time')];
            }
            $remindedNum+=count($RemindData);
        }
        $Reply = array();
        foreach ($ReplyDatas as $ReplyedPostId => $ReplyData) {
            foreach ($ReplyData as $ReplyManId => $ReplyPostId) {
                $ReplyManName = User::getUsernameById($ReplyManId);
                $ReplyPost = Post::find()->where(['PostId' => $ReplyPostId])->asArray()->one();
                $simpleInfo = strip_tags(substr(ArrayHelper::getValue($ReplyPost, 'content'), 0, 100));
                $Reply[] = ['ReplyedPostId' => $ReplyedPostId, 'ReplyManName' => $ReplyManName, 'simpleInfo' => $simpleInfo, 'ReplyPostId' => $ReplyPostId];
            }
            $replyNum+=count($ReplyData);
        }
        $Talk=array();
        foreach ($talkDatas as $ReplyedPostId => $TalkedData) {
            foreach ($TalkedData as $TalkManId => $TalkPostId) {
                $TalkManName = User::getUsernameById($TalkManId);
                $TalkPost = Post::find()->where(['PostId' => $TalkPostId])->asArray()->one();
                $simpleInfo = strip_tags(substr(ArrayHelper::getValue($TalkPost, 'content'), 0, 100));
                $Talk[] = ['ReplyedPostId' => $ReplyedPostId, 'TalkManName' => $TalkManName, 'simpleInfo' => $simpleInfo, 'TalkPostId' => $TalkPostId];
            }
            $talkNum+=count($TalkedData);
        }
        $need_show = -1;
        $session = \Yii::$app->session;
        $session->open();
        if($session['need_show'] != null) {
            $need_show = $session['need_show'];
        }
        $session['need_show']=-1;
        return $this->render('discussion.php',[
            'simplePosts' => $simplePosts,
            'allUsername' => $allUsername,
            'Remind' => $Remind,
            'Reply' => $Reply,
            'Talk'=>$Talk,
            'remindedNum' =>$remindedNum,
            'replyNum'=>$replyNum,
            'talkNum'=>$talkNum,
            'need_show'=>$need_show,
        ]);
    }
    //用来显示页面右侧的帖子的完整信息
    public function actionShowWholePost()
    {
        if (Yii::$app->request->isAjax) {

            $postId = Yii::$app->request->post();
            $selectedPost = Post::getPostByPostId($postId);
            if($selectedPost==null) return "您访问的帖子已被删除";
            $replyPosts=null;
            if($selectedPost!=null) $replyPosts = Post::getnextPosts($selectedPost);
            //Yii::warning($replyPosts);
            Post::addReadList($postId);
            Remind::deleteRemindedData(User::getAppUserID(),$postId['postId']);
            $selectedPost = Post::getPostByPostId($postId);
            $replyPosts = Post::getnextPosts($selectedPost);
            return $this->renderPartial('showWholePost.php',[
                'selectedPost' => $selectedPost,
                'replyPosts' => $replyPosts,
            ],false,true);
        }
    }

    public function actionChangeLike()
    {
        if(Yii::$app->request->isAjax){
            $message=Yii::$app->request->post();
            $postId =$message['postId'];
            Post::changeLikemenList($postId);
        }
    }

    //发新帖子
    public function actionEditNewPost()
    {
        $allUsername = User::getAllUsername();
        $model = new NewPostForm;
        if($model->load(Yii::$app->request->post()))    {
            $model->content = ArrayHelper::getValue(Yii::$app->request->post(),'content');
            if(($postId=$model->addPost()) !== false)   {
                $this->render('say', ['message' => $model]);
                sleep(1);
                $session = Yii::$app->session;
                $session->open(); 
                $session['need_show'] = $postId;
                $this->redirect(array('course/discussion/discussion'));
                return;
            }
            else return $this->render('say', ['message' => '发帖失败']);
        }
        return $this->renderAjax('editNewPost.php',[
            'model' => $model,
            'allUsername' => $allUsername,
        ]);
    }

    public function actionAcceptRemindList()
    {
        if (Yii::$app->request->isAjax) {
            $session = Yii::$app->session;
            $session->open();
            $session['remindName'] = ArrayHelper::getValue(Yii::$app->request->post(), 'remindName');

            return;
        }
    }
    //删除提醒标记
    public function actionDeleteRemindedData(){
        if(Yii::$app->request->isAjax){
            $message=Yii::$app->request->post();
            $RemindedManId=$message['RemindedManId'];
            $RemindPostId=$message['RemindPostId'];
            $postId=$message['postId'];
            Remind::deleteRemindedData($RemindedManId,$RemindPostId);
            $selectedPost = Post::getPostByPostId($postId);
            $replyPosts = Post::getnextPosts($selectedPost);
            Post::addReadList($postId);
            return $this->renderPartial('showWholePost.php',[
                'RemindPostId'=>$RemindPostId,
                'selectedPost' => $selectedPost,
                'replyPosts' => $replyPosts,
            ],false,true);
        }
    }

    //删除回复标记
    public function actionDeleteReplyedData(){
        if(Yii::$app->request->isAjax){
            $message=Yii::$app->request->post();
            $ReplyedManId=$message['ReplyedManId'];
            $ReplyPostId=$message['ReplyPostId'];
            $postId=$message['postId'];
            Remind::deleteAData($ReplyedManId,$ReplyPostId);
            $selectedPost = Post::getPostByPostId($postId);
            $replyPosts = Post::getnextPosts($selectedPost);
            Post::addReadList($postId);
           
            return $this->renderPartial('showWholePost.php',[
                'selectedPost' => $selectedPost,
                'replyPosts' => $replyPosts,
            ],false,true);
        }
    }

    //删除讨论标记
    public function actionDeleteTalkData(){
        if(Yii::$app->request->isAjax){
            $message=Yii::$app->request->post();
            $ReplyedManId=$message['ReplyedManId'];
            $TalkPostId=$message['TalkPostId'];
            $postId=$message['postId'];
            Remind::deleteBData($ReplyedManId,$TalkPostId);
            $selectedPost = Post::getPostByPostId($postId);
            $replyPosts = Post::getnextPosts($selectedPost);
            Post::addReadList($postId);
            return $this->renderPartial('showWholePost.php',[
                'selectedPost' => $selectedPost,
                'replyPosts' => $replyPosts,
            ],false,true);
        }
    }
    //回复帖子
    public function actionReplyPost()
    {
        if (Yii::$app->request->isAjax) {
            $session = Yii::$app->session;
            $session->open();
            $session['fatherPostAId'] = ArrayHelper::getValue(Yii::$app->request->post(), 'fatherPostAId');
            $session['fatherPostBId'] = ArrayHelper::getValue(Yii::$app->request->post(), 'fatherPostBId');
            $session['postType'] = ArrayHelper::getValue(Yii::$app->request->post(),'postType');
             //Post::alert($session['fatherPostAId']);
            //return (Yii::$app->session->get('postType'));
        }
        $model = new ReplyPostForm();
        if($model->load(Yii::$app->request->post()))    {
            $session = Yii::$app->session;
            $session->open();
            $session['need_show']=$session['fatherPostAId'];
            Post::alert($session['need_show']);
            $model->addReplyPost($session->get('fatherPostAId'),$session->get('postType'),$session->get('fatherPostBId'));
            $session->close();
            $this->redirect(array('course/discussion/discussion'));
                return;
        }
        return $this->renderAjax('replyPost.php', [
            'model' => $model,
        ]);
        //return Yii::$app->session->get('fatherPostId')+" "+Yii::$app->session->get('postType');
    }

    public function actionModifyShowRule()
    {
        if (Yii::$app->request->isAjax) {
            $rule = Yii::$app->request->post();
            $simplePosts = Post::getSimplePosts();
            //Yii::warning($simplePosts);
            $msg = "更改成功";
            return $this->render('say', [
                'message' => $msg
            ]);
        }
    }

    public function actionModifyOrderRule()
    {

        if (Yii::$app->request->isAjax) {
            $ajaxInfo = Yii::$app->request->post();
            $orderRule = ArrayHelper::getValue($ajaxInfo,'orderRule');

            $msg = call_user_func(array("app\models\course\Post", $orderRule));

            return $this->renderPartial('simplePostList.php',[
                'simplePosts' => $msg,
            ]);
        }
    }

    public function actionDeleteMainPost()
    {
        if (Yii::$app->request->isAjax) {
            $ajaxInfo = Yii::$app->request->post();
            $deletePostId = ArrayHelper::getValue($ajaxInfo,'postId');

            Post::deleteMainPost($deletePostId);

            return $this->redirect(array('course/discussion/discussion'));
        }
    }

    public function actionDeleteFollowPost()
    {
        if (Yii::$app->request->isAjax) {
            $ajaxInfo = Yii::$app->request->post();
            $followPostId = ArrayHelper::getValue($ajaxInfo,'postId');
            $mainPostId = ArrayHelper::getValue($ajaxInfo,'fatherPostId');

            Post::deleteFollowPost($followPostId,$mainPostId);
            return;
        }
    }

    public function actionDeleteTalkPost()
    {
        if (Yii::$app->request->isAjax) {
            $ajaxInfo = Yii::$app->request->post();
            $followPostId = ArrayHelper::getValue($ajaxInfo,'postId');
            $mainPostId = ArrayHelper::getValue($ajaxInfo,'fatherPostId');

            Post::deleteTalkPost($followPostId,$mainPostId);
            return;
        }

    }

    public function actionGetSimplePage()
    {        
        if (Yii::$app->request->isAjax) {
            $ajaxInfo = Yii::$app->request->post();
            $pageNumber = ArrayHelper::getValue($ajaxInfo,'pageNumber');
            $simplePosts = Post::getSimplePosts($pageNumber);
            return $this->renderAjax('simplePostList.php', [
                        'simplePosts' => $simplePosts,
                    ]);
        }
    }

    /*public function beforeAction($action)
    {
        $message = '';
        if(\Yii::$app->user->isGuest)
            $message = 'Please Login First';
        else{
            $courseid = $_COOKIE['courseid'];
            $studentid = User::getAppUser()->id;
            if(!$courseid || !Courseenrollment::findOne(['courseid'=>$courseid,'studentid'=>$studentid]))
                $message = 'Please Enter Course First';
        }
        if($message!='')
            $this->redirect('/site/say?message='.urlencode($message));
        return parent::beforeAction($action);
    }*/

    public static function isPostDisplayable($post)
    {
        Yii::warning($post);
    }
}