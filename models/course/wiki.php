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
}