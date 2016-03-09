<?php
/**
 * Created by PhpStorm.
 */

namespace app\controllers\course;

use app\models\account\User;
use app\models\course\Courseenrollment;
use app\models\course\NewPostForm;
use app\models\course\Post;
use yii\web\Controller;
use Yii;
use yii\data\ActiveDataProvider;

class DiscussionController extends Controller
{
    private static $orderRule = "";//储存列表排序的规则

    private static $showRules = array();//储存列表可显示的规则
    /*
     * $showRules中elements声明：
     * unread=>只显示未读的信息
     */

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'Kupload' => [
                'class' => 'pjkui\kindeditor\KindEditorAction',
            ]
        ];
    }

    public function actionIndex()
    {
    }
    //讨论区的主页面
    public function actionDiscussion()
    {
        $simplePosts = Post::getSimplePosts();
        //Yii::warning($simplePosts);
        return $this->render('discussion.php',[
            'simplePosts' => $simplePosts,
        ]);
    }
    //用来显示页面右侧的帖子的完整信息
    public function actionShowWholePost()
    {
        if (Yii::$app->request->isAjax) {
            $postId = Yii::$app->request->post();
            $selectedPost = Post::getPostByPostId($postId);

            Post::addReadList($postId);
            return $this->renderPartial('showWholePost.php',[
                'selectedPost' => $selectedPost,
            ],false,true);
        }
    }
    //发新帖子
    public function actionEditNewPost()
    {
            $model = new NewPostForm;
            if($model->load(Yii::$app->request->post()))    {
                if($model->addPost())   $msg = '发帖成功';
                else    $msg = '发帖失败';
                return $this->render('say', ['message' => $msg]);
            }
            return $this->renderAjax('editNewPost.php',[
                'model' => $model,
            ]);
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

    public function beforeAction($action)
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
    }

    public static function isPostDisplayable($post)
    {
        Yii::warning($post);
    }
}