<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/2
 * Time: 16:45
 */

namespace app\controllers;

use app\models\account\AccountForm;
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
        return $this->render('index',[
            'accountform' => $accountform,
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
}