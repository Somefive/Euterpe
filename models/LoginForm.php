<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;
    private $_account = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
//            $user = $this->getUser();
            $account = $this->getAccount();

            if (!$account || !$account->validatePassword(md5($this->password))){
                $this->addError($attribute, 'Incorrect username or password.');
            }

//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Incorrect username or password.');
//            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * Finds account by [[username]]
     *
     * @return array|bool|null|\yii\db\ActiveRecord
     */
    public function getAccount()
    {
        if ($this->_account === false) {
            $this->_account = Account::find()->where(['Username' => $this->username])->one();
        }

        return $this->_account;
    }
}
