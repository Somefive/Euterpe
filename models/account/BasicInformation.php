<?php

namespace app\models\account;

use yii\db\ActiveRecord;

class BasicInformation extends ActiveRecord
{
    public function rules()
    {
        return [
            [['tel','schoolid'],'match','pattern'=>'/^[0-9]{0,15}$/','message'=>'Format Incorrect!'],
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