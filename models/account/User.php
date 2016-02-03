<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/3
 * Time: 17:24
 */
namespace app\models\account;

use yii\db\ActiveRecord;
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

    public function isStudent()
    {
        return $this->type == 'Student';
    }

    public function isTeacher()
    {
        return $this->type == 'Teacher';
    }

    public static function getAppUser(){
        return \Yii::$app->user->identity;
    }
}