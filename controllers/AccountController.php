<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/2
 * Time: 16:45
 */

namespace app\controllers;

use app\models\account\AccountForm;
use app\models\account\StudentBasicInformationForm;
use app\models\account\LoginForm;
use app\models\account\RegisterForm;
use app\models\account\User;
use Yii;
use yii\web\Controller;

class AccountController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $accountform = new AccountForm();
        $accountform->username = \Yii::$app->user->identity->username;
        $accountform->oldemail = \Yii::$app->user->identity->email;
        $accountform->email = \Yii::$app->user->identity->email;
        $studentbasicinformationform = StudentBasicInformationForm::findOne(User::getAppUser()->id);
        if(!$studentbasicinformationform) $studentbasicinformationform = new StudentBasicInformationForm();
        return $this->render('index',[
            'accountform' => $accountform,
            'studentbasicinformationform' => $studentbasicinformationform,
        ]);
    }

    public function actionAccountmodify()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->render('say',['message'=>'请先登录！']);
        }
        $accountform = new AccountForm();
        if($accountform->load(Yii::$app->request->post()))
        {
            $accountform->id = \Yii::$app->user->identity->id;
            $accountform->username = \Yii::$app->user->identity->username;
            if(!$accountform->validate())
                return $this->render('say',['message'=>'格式有误！']);
            return $accountform->Modify()?$this->render('say',['message'=>'修改成功！']):$this->render('say',['message'=>'修改失败...']);
        }
        return $this->render('say',['message'=>'修改失败……']);
    }

    public function actionStudentbasicinformationmodify()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->render('say',['message'=>'请先登录！']);
        }
        $studentbasicinformationform = new StudentBasicInformationForm();
        if($studentbasicinformationform->load(Yii::$app->request->post()))
        {
            $studentbasicinformationform->id = User::getAppUser()->id;
            if(!$studentbasicinformationform->validate())
                return $this->render('say',['message'=>'格式有误！']);
            StudentBasicInformationForm::deleteAll(['id'=>$studentbasicinformationform->id]);
            return $studentbasicinformationform->save()?$this->render('say',['message'=>'修改成功！']):$this->render('say',['message'=>'修改失败...']);
        }
        return $this->render('say',['message'=>'修改失败……']);
    }

    public function actionRegister()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if($model->load(Yii::$app->request->post())){
            if($model->Register()){
                $msg = '注册成功！';
            }
            else
                $msg = '注册失败……';
            return $this->render('say', [
                'message' => $msg
            ]);
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}