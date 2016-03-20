<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/15
 * Time: 11:53
 */
namespace app\controllers\course;

use app\models\account\User;
use app\models\course\Wiki;
use yii\web\Controller;
use Yii;

class WikiController extends Controller
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
        $wikis = Wiki::find()->all();
        return $this->render('index',[
            'wikis' => $wikis,
        ]);
    }
    public function actionCreatewiki()
    {
        return $this->render('createwiki.php');
    }

    public function actionMywiki()
    {
        $studentwikis = Wiki::getWikis(User::getAppUser()->getId());
        return $this->render('mywiki',[
            'mywikis' => $studentwikis,
        ]);
    }

    public function actionCreatesuccess()
    {
        $wiki = new Wiki();
        $wiki->studentid = User::getAppUser()->getId();
        $wiki->title = $_POST['title'];
        $wiki->tag = $_POST['tag'];
        $wiki->detail = $_POST['detail'];
        if($wiki->save())
        {
            echo '添加成功';
        }
        else {
            echo '添加失败';
        }
    }

    public function actionDeletewiki()
    {
        $wikiid = $_POST['wikiid'];
        Wiki::deleteAll(['id'=>$wikiid]);
        echo '删除成功！';
    }

    public function actionCompilewiki()
    {
        $wikiid = $_POST['wikiid'];
        $wiki = Wiki::findAll(['id'=>$wikiid]);
        return $this->render('compilewiki',['wiki'=>$wiki,]);
    }

    public function actionEnterwiki()
    {
        $wikiid = Yii::$app->request->get('wikiid');
        $wiki = Wiki::getWikiById($wikiid);
        return $this->render('wiki',['wiki'=>$wiki,]);
    }

    public function beforeAction($action)
    {
        $message = '';
        if(\Yii::$app->user->isGuest)
            $message = 'Please Login First 请先登录';
        //else{
        //    $courseid = $_COOKIE['courseid'];
        //    $studentid = User::getAppUser()->id;
        //    if(!$courseid || !Courseenrollment::findOne(['courseid'=>$courseid,'studentid'=>$studentid]))
        //        $message = 'Please Enter Course First 请先进入课程';
        //}
        if($message!='')
            $this->redirect('/site/say?message='.urlencode($message));
        return parent::beforeAction($action);
    }
}