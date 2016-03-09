<?php

namespace app\models\course;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\account\User;

/*用来与数据库的表post进行数据交互：查找，增加，改变，删除
  对外提供一些接口对数据进行查询，更改
*/
class Post extends ActiveRecord
{
    public static function getPostByPostId($id)
    {
        $post = static::find()->where(['postId' => $id])->asArray()->all();
        return array_map("static::parseList",$post)[0];
    }
    //得到页面左侧渲染的帖子列表的精简信息
    public static function getSimplePosts()
    {
        $lastestPosts = static::find()->asArray()->all();
        $lastestPosts=array_map("static::parseSimpleInfo",$lastestPosts);
        return $lastestPosts;
    }
    //帖子被看的时候，改变帖子的readMenList
    public static function addReadList($postId)
    {
        $selectedPost = Post::findOne($postId);
        if(User::getAppUserID() == $selectedPost->postManId)
            return;
        $selectedPost->readMenList = ($selectedPost->readMenList.'|'.User::getAppUserID());
        $selectedPost->save();
        return;
    }
    //把帖子变成精简信息
    private static function parseSimpleInfo($post)
    {
        $simpleInfos =  explode('|',ArrayHelper::getValue($post,'simpleInfo'));
        $indexArray = array("postManId","postManName","title","content","time","anoymous","sheildteacher");
        $simpleInfos = array_combine($indexArray,$simpleInfos);

        $readMenIds = explode('|',ArrayHelper::getValue($post,'readMenList'));
        if(in_array(User::getAppUserID(),$readMenIds))  $isRead = true ;
        else $isRead = false ;


        $likeMenIds = explode('|',ArrayHelper::getValue($post,'likeMenList'));
        $likeMenCount = count($likeMenIds);

        $newElements = array(
            'postId' => ArrayHelper::getValue($post,'postId'),
            'isRead' => $isRead,
            'likeMenCount' => $likeMenCount
            );
        //最终的数组keys："postManId","postManName","title","content","time"，"postId","isRead,likeMenCount"
        return array_merge($newElements,$simpleInfos);
    }
    //解析帖子的likeMenList和readMenList信息
    private static function parseList($post)
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


    public static function orderByTime()
    {
        $wholePostList = static::find()->asArray()->all();
        ArrayHelper::multisort($wholePostList,'time',SORT_DESC);
        return array_map("static::parseSimpleInfo",$wholePostList);
        return $lastestPosts;
    }

    public static function orderByHot()
    {
        $simplePostList = Post::getSimplePosts();
        ArrayHelper::multisort($simplePostList,'likeMenCount',SORT_DESC);
        return $simplePostList;
    }
}