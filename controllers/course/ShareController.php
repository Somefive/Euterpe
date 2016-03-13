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
use Yii;

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

    public function actionNewpost()
    {
        return $this->render('newpost.php');
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