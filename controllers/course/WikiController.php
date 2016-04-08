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
use yii\filters\AccessControl;
use Yii;

class WikiController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

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
        $focuswiki = new Wiki();
        if(!empty($_POST['operate']) and $focuswiki->load(Yii::$app->request->post()) and $focuswiki->validate()){
            if($_POST['operate']=='create') {
                $focuswiki->id = '';
                $focuswiki->flush();
                $focuswiki = new Wiki();
            }
            else if($_POST['operate']=='edit'){
                $oriwiki = Wiki::getWikiById($focuswiki->id);
                if($oriwiki!=null and $oriwiki->studentid==$focuswiki->studentid and $oriwiki->studentid==User::getAppUserID()){
                    $focuswiki->flush();
                    $focuswiki = new Wiki();
                }
            }
            else if($_POST['operate']=='delete'){
                $oriwiki = Wiki::getWikiById($focuswiki->id);
                if($oriwiki!=null and $oriwiki->studentid==$focuswiki->studentid and $oriwiki->studentid==User::getAppUserID()){
                    $oriwiki->delete();
                    $focuswiki = new Wiki();
                }
            }
        }
        $focuswiki->studentid = User::getAppUser()->id;
        if($query=Yii::$app->request->get('query')){
            $wikis = Wiki::find()->where(['or',['like','tag',$query],['like','title',$query]])->orderBy(['favor'=>SORT_DESC])->all();
        }
        else {
            $wikis = Wiki::find()->orderBy(['favor'=>SORT_DESC])->all();
        }
        return $this->render('index',[
            'wikis' => $wikis,
            'focuswiki' => $focuswiki,
        ]);
    }
//    public function actionCreatewiki()
//    {
//        return $this->render('createwiki.php');
//    }

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
            return $this->redirect('/site/say?message=添加成功');
        else {
            return $this->redirect('/site/say?message=添加失败');
        }
    }

    public function actionDeletewiki()
    {
        $wikiid = $_POST['wikiid'];
        Wiki::deleteAll(['id'=>$wikiid]);
        return $this->redirect('/site/say?message=删除成功');
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

    public function actionFavor(){
        $wikiid = Yii::$app->request->get('wikiid');
        $wiki = Wiki::findOne(['id'=>$wikiid]);
        if(!$wiki)
            return null;
        $wiki->favor++;
        $wiki->save();
        return json_encode(['wikiid'=>$wikiid,'favor'=>$wiki->favor]);
    }
}