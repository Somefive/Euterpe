<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/3
 * Time: 15:40
 */

namespace app\models\account;

use Yii;
use yii\base\Model;

class StudentBasicInformationForm extends StudentBasicInformation
{
    public function rules()
    {
        return [
            [['tel','schoolid'],'match','pattern'=>'/^[0-9]{0,15}$/','message'=>'Tel Format Incorrect!'],
            ['school','default','value'=>'None'],
            [['chname','enname','gender'],'default','value'=>'']
        ];
    }

    public function attributeLabels()
    {
        return [
            'school' => '学校 School',
            'schoolid' => '学号 School ID',
            'chname' => '中文名字 Chinese Name',
            'enname' => '英文名字 English Name',
            'gender' => '性别 Gender',
            'tel' => '电话 Telphone'
        ];
    }
}