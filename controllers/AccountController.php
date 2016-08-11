<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/2
 * Time: 16:45
 */

namespace app\controllers;

use app\models\account\AccountForm;
use app\models\account\BasicInformation;
use app\models\account\LoginForm;
use app\models\account\RegisterForm;
use app\models\account\User;
use app\models\course\Course;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class AccountController extends Controller
{
    public $enableCsrfValidation = false;

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

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => [],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','account-modify','basic-information-modify','logout'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login','register'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['verify'],
                        'roles' => ['teacher'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $accountform = new AccountForm();
        $accountform->username = Yii::$app->user->identity->username;
        $accountform->oldemail = Yii::$app->user->identity->email;
        $accountform->email = Yii::$app->user->identity->email;
        $basicInformation = BasicInformation::findOne(Yii::$app->user->id);
        if(!$basicInformation) $basicInformation = new BasicInformation();
        $studentcourses = Course::getCourses(Yii::$app->user->id);

        return $this->render('index',[
            'accountform' => $accountform,
            'basicInformation' => $basicInformation,
            'studentcourses' => $studentcourses,
        ]);
    }

    public function actionAccountModify() {
        $user = User::findOne(Yii::$app->user->id);
        $pwd = Yii::$app->request->post("password");
        $repwd = Yii::$app->request->post("repassword");
        if($pwd != $repwd) return json_encode(["status"=>false,"message"=>"repassword error"]);
        $user->password = Yii::$app->request->post("password");
        $user->email = Yii::$app->request->post("email");
        if(!$user->validate()) return json_encode(["status"=>false,"message"=>"input error"]);
        if(!$user->save()) return json_encode(["status"=>false,"message"=>"db error"]);
        return json_encode(["status"=>true,"message"=>"success!"]);
    }

    public function actionBasicInformationModify() {
        $info = BasicInformation::findOne(Yii::$app->user->id);
        if(!$info) {
            $info = new BasicInformation();
            $info->id = Yii::$app->user->id;
        }
        $info->school = Yii::$app->request->post("school");
        $info->schoolid = Yii::$app->request->post("schoolid");
        $info->chname = Yii::$app->request->post("chname");
        $info->enname = Yii::$app->request->post("enname");
        $info->gender = Yii::$app->request->post("gender");
        $info->tel = Yii::$app->request->post("tel");
        if(!$info->validate()) return json_encode(["status"=>false,"message"=>"input error"]);
        if(!$info->save()) return json_encode(["status"=>false,"message"=>"db error"]);
        return json_encode(["status"=>true,"message"=>"success!"]);
    }

    public function actionVerify() {
        $toVerifyId = Yii::$app->request->post("verify-id");
        $info = BasicInformation::findOne($toVerifyId);
        if(!$info) return json_encode(["status"=>false,"message"=>"id not found"]);
        else if($info->verify == 1) return json_encode(["status"=>false,"message"=>"id verified"]);
        else return json_encode(["status"=>true,"message"=>"success"]);
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