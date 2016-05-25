<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/7
 * Time: 20:04
 */
namespace app\models\course;

use yii\db\ActiveRecord;

class Composition extends ActiveRecord
{
    public function rules()
    {
        return [
            [['studentid', 'courseid', 'title', 'content', 'status', 'score', 'remark', 'date'], 'required'],
        ];
    }
}