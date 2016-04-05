<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/15
 * Time: 11:55
 */
namespace app\models\course;

use yii\db\ActiveRecord;

class Wiki extends ActiveRecord
{
    public static function getWikis($studentid)
    {
        $Mywikis = Wiki::findAll(['studentid'=>$studentid]);
        return $Mywikis;
    }

    public static function getWikiById($wikiid)
    {
        $wiki = Wiki::findOne(['id' => $wikiid]);
        return $wiki;
    }

    public function attributeLabels()
    {
        return [
            'studentid' => '',
            'tag' => 'Tag 分隔符为;'
        ];
    }

    public function rules()
    {
        return [
            [['studentid','title'],'required'],
            [['detail','tag'],'default','value'=>''],
        ];
    }

    public function Flush(){
        $wiki = static::findOne(['id'=>$this->id]);
        if($wiki==null){
            if(static::findOne(['title'=>$this->title])!=null)
                return false;
            return $this->insert();
        }
        else
            return $this->update();
    }
}