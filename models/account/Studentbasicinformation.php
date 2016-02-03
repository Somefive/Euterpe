<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/2
 * Time: 20:52
 */

namespace app\models\account;

use yii\db\ActiveRecord;

class StudentBasicInformation extends ActiveRecord
{
    public static function tableName()
    {
        return 'studentbasicinformation';
    }
}