<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/2
 * Time: 16:53
 */

namespace app\models\account;

use Yii;
use yii\base\Model;
use app\models\User;

class AccountForm extends Model
{
    public $username;
    public $password;
    public $repassword;
    public $email;

    public $oldemail;
    public $id;

    public function rules()
    {
        return [
            [['username', 'password', 'repassword', 'email'], 'required', 'message'=>'{attribute}不能为空'],
            ['password','match','pattern'=>'/^[0-9a-zA-Z]{6,32}$/','message'=>'{attribute}必须为6-32位数字或字母组成'],
            ['repassword','compare','compareAttribute'=>'password','message'=>'{attribute}两次密码不一致'],
            ['email','email','message'=>'邮箱格式不正确'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名 username',
            'password' => '密码 password',
            'repassword' => '再次输入密码 repeat password',
            'email' => '邮箱 email'
        ];
    }

    public function Modify()
    {
        $user = User::findOne($this->id);
        if(!$user || !$this->validate())
            return false;
        $user->password = $this->password;
        $user->email = $this->email;
        return $user->save();
    }
}