<?php

namespace app\models\course;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\account\User;

class Post extends ActiveRecord
{
    public function getPostByPostId($id)
    {
        $post = static::find()->where(['postId' => $id])->asArray()->all();
        return array_map("static::parseList",$post)[0];
    }

    public function getWholePosts()
    {
    }

    public function getSimplePosts()
    {
        $lastestPosts = static::find()->asArray()->all();
        $lastestPosts=array_map("static::parseSimpleInfo",$lastestPosts);
        return $lastestPosts;
    }

    public static function addReadList($postId)
    {
        //$post = getPostByPostId($postId);
        //$originReadList = ArrayHelper::getValue($post,'readMenList');
        //$post[readMenList] = ($originReadList.'|'.User::getAppUserID() );
    }

    private function parseSimpleInfo($post)
    {
        $simpleInfos =  explode('|',ArrayHelper::getValue($post,'simpleInfo'));
        $indexArray = array("postManId","postManName","title","content","time");
        $simpleInfos = array_combine($indexArray,$simpleInfos);

        $readMenIds = explode('|',ArrayHelper::getValue($post,'readMenList'));
        if(in_array(User::getAppUserID(),$readMenIds))
            $isRead = true ;
        else $isRead = false ;

        $newElements = array(
            'postId' => ArrayHelper::getValue($post,'postId'),
            'isRead' => $isRead
            );
        return array_merge($newElements,$simpleInfos);
    }

    private function parseList($post)
    {
        $likeMenIds = explode('|',ArrayHelper::getValue($post,'likeMenList'));
        $likeMenCount = count($likeMenIds);
        //unset($post['likeMenList']);

        $readMenIds = explode('|',ArrayHelper::getValue($post,'readMenList'));
        $readMenCount = count($readMenIds);
        //unset($post['readMenList']);

        $newElements = array(
            'likeMenCount' => $likeMenCount,
            'readMenCount' => $readMenCount
        );
        return array_merge($post,$newElements);
    }

}