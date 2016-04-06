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
            'id' => '',
            'studentid' => '',
            'tag' => 'Tag 分隔符为;'
        ];
    }

    public function rules()
    {
        return [
            [['studentid','title'],'required'],
            [['detail','tag','id'],'default','value'=>''],
        ];
    }

    public function Flush(){
        $wiki = static::findOne(['id'=>$this->id]);
        if($wiki==null){
            if(static::findOne(['title'=>$this->title])!=null)
                return false;
            $this->isNewRecord = true;
            return $this->insert();
        }
        else{
            $wiki->title = $this->title;
            $wiki->detail = $this->detail;
            $wiki->tag = $this->tag;
            return $wiki->save();
        }
    }
}