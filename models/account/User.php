<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/3
 * Time: 17:24
 */
namespace app\models\account;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    public static function getUsernameById($id)
    {
        $user = User::findIdentity($id);
        return $user?$user->getUserName():"";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function getAppUser(){
        return \Yii::$app->user->identity;
    }

    public static function getAppUserID(){
        return \Yii::$app->user->identity->getId();
    }

    public static function isTeacher(){
        return \Yii::$app->user->can("teacher");
    }

    public function getInfo(){
        return BasicInformation::findOne($this->getId());
    }
}