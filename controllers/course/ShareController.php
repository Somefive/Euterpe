<?php
/**
 * Created by PhpStorm.
 * User: bingochen
 * Date: 2016/2/29
 * Time: 9:14
 */

namespace app\controllers\course;

use app\models\account\User;
use app\models\course\Courseenrollment;
use yii\web\Controller;
use app\models\course\share\VocabularyForm;
use app\models\course\share\Vocabulary;
use Yii;

class ShareController extends Controller
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

    public function actionCreate()
    {
        $model = new VocabularyForm();
        if($model->load(Yii::$app->request->post()))
        {
            if($model->createVocabulary()){
                $msg = '创建成功！';
            }
            else
                $msg = '创建失败……';
            return $this->render('say', [
                'message' => $msg
            ]);
        }
        return $this->render('create.php',['model'=>$model]);
    }



    public function beforeAction($action)
    {
        $message = '';
        if(\Yii::$app->user->isGuest)
            $message = 'Please Login First 请先登录';
        else{
            $courseid = $_COOKIE['courseid'];
            $studentid = User::getAppUser()->id;
            if(!$courseid || !Courseenrollment::findOne(['courseid'=>$courseid,'studentid'=>$studentid]))
                $message = 'Please Enter Course First 请先进入课程';
        }
        if($message!='')
            $this->redirect('/site/say?message='.urlencode($message));
        return parent::beforeAction($action);
    }
}