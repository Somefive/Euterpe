<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2015/12/12
 * Time: 14:49
 */

namespace app\models;

use yii\db\ActiveRecord;

class Account extends ActiveRecord
{

    public function validatePassword($password)
    {
        return $this && ($this->Password == $password);
    }

    /**
     * db TableName
     * @return string
     */
    public static function tableName()
    {
        return 'Account';
    }
}