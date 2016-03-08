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

    public function actionDiscussion()
    {
        $appointedPost = new Post();
        $selectedPost = $appointedPost->getPostByPostId(0);
        Yii::warning($selectedPost);


        $allPost = new Post();
        $simplePosts = $allPost->getSimplePosts();
        return $this->render('discussion.php',[
            'simplePosts' => $simplePosts,
        ]);
    }

    public function actionShowWholePost()
    {
        $appointedPost = new Post();
        if (Yii::$app->request->isAjax) {
            $postId = Yii::$app->request->post();
            $selectedPost = $appointedPost->getPostByPostId($postId);

            Yii::warning($selectedPost);

            //$originReadList = ArrayHelper::getValue($selectedPost,'readMenList');
            //$newReadList = ($originReadList.'|'.User::getAppUserID() );
            //$selectedPost['readMenList'] = $newReadList;

            return $this->renderPartial('showWholePost.php',[
                'selectedPost' => $selectedPost,
            ],false,true);
        }
    }

    public function actionEditNewPost()
    {
        //if (Yii::$app->request->isAjax) {
            $model = new NewPostForm;
            if($model->load(Yii::$app->request->post())){
                //Yii::warning($model);
                if($model->addPost()){
                    $msg = '发帖成功';
                }
                else
                    $msg = '发帖失败';
                return $this->render('say', [
                    'message' => $msg
                ]);
            }
            return $this->renderAjax('editNewPost.php',[
                'model' => $model,
            ]);
        //}
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

    public function actionTest()
    {

    }
}