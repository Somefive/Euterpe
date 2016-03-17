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
        // Yii::warning(array_map("static::parseList",$post));
        return array_map("static::parseList", $post)[0];
    }

    //得到页面左侧渲染的帖子列表的精简信息
    public static function getSimplePosts()
    {
        $lastestPosts = static::find()->where(['isPost' => 0])->asArray()->all();
        $lastestPosts = array_map("static::parseSimpleInfo", $lastestPosts);
        return $lastestPosts;
    }

    //帖子被看的时候，改变帖子的readMenList
    public static function addReadList($postId)
    {
        $selectedPost = Post::findOne($postId);
        if (User::getAppUserID() == $selectedPost->postManId)
            return;
        $selectedPost->readMenList = ($selectedPost->readMenList . '|' . User::getAppUserID());
        $selectedPost->save();
        return;
    }
    //改变该帖子点赞的用户列表
    public static function changeLikemenList($postId)
    {
        $selectedPost = Post::findOne($postId);
        $likeMenIds = explode('|', ArrayHelper::getValue($selectedPost, 'likeMenList'));
        $key=false;
        for($x=0;$x<count($likeMenIds);$x++)if($likeMenIds[$x]==User::getAppUserID())$key=true;
        //$key=
        if($key!=false){
            array_unique($likeMenIds);
            $index=array_search(User::getAppUserID(),$likeMenIds);
            array_splice($likeMenIds,$index,1);
            $selectedPost->likeMenList=null;
            if(count($likeMenIds)==0)$selectedPost->likeMenList=null;
            else {
                foreach($likeMenIds as $like){
                    if($selectedPost->likeMenList==null)$selectedPost->likeMenList = $like;
                    else $selectedPost->likeMenList = ($selectedPost->likeMenList . '|' . $like);
                }
            }
            // $selectedPost->likeMenList="1|2";
        }
        else {
            if($selectedPost->likeMenList==null)$selectedPost->likeMenList =User::getAppUserID() ;
            else  $selectedPost->likeMenList = ($selectedPost->likeMenList . '|' . User::getAppUserID());
        }
        $selectedPost->save();
        return;
    }

    //把帖子变成精简信息
    private static function parseSimpleInfo($post)
    {
        $simpleInfos = explode('|', ArrayHelper::getValue($post, 'simpleInfo'));
        $indexArray = array("postManId", "postManName", "title", "content", "time", "anoymous", "shieldteacher");
        $simpleInfos = array_combine($indexArray, $simpleInfos);
        //处理匿名,判断登陆者是否是作者，若是作者则不在匿名
        //匿名状态下，更改发帖人名字为ANOYMOUS
        if (User::getAppUserID() == ArrayHelper::getValue($simpleInfos, 'postManId'))
            $simpleInfos['anoymous'] = 0;
        if ($simpleInfos['anoymous'] == 1) $simpleInfos['postManName'] = "ANOYMOUS";

        $readMenIds = explode('|', ArrayHelper::getValue($post, 'readMenList'));
        if (in_array(User::getAppUserID(), $readMenIds)) $isRead = true;
        else $isRead = false;


        $likeMenIds = explode('|', ArrayHelper::getValue($post, 'likeMenList'));
        //if(in_array(User::getAppUserID(), $likeMenIds))$islike=
        $likeMenCount = count($likeMenIds);

        $newElements = array(
            'postId' => ArrayHelper::getValue($post, 'postId'),
            'isRead' => $isRead,
            'likeMenCount' => $likeMenCount,
        );
        //最终的数组keys："postManId","postManName","title","content","time"，"postId","isRead,likeMenCount"
        return array_merge($newElements, $simpleInfos);
    }

    //解析帖子的likeMenList和readMenList信息
    private static function parseList($post)
    {
        $likeMenIds = explode('|', ArrayHelper::getValue($post, 'likeMenList'));
        $likeMenName = array();
        $likeMenCount = count($likeMenIds);
        if ($likeMenCount == 1 && $likeMenIds[0] == '') {
            $likeMenCount = 0;
        } else {
            foreach ($likeMenIds as $likeMenId) {
                if ($likeMenId == "") continue;
                array_push($likeMenName, User::getUsernameById($likeMenId));
            }
        }
        if(in_array(User::getAppUserID(), $likeMenIds))$islike=true;
        else $islike=false;

        if(in_array(User::getUsernameById(User::getAppUserId()),$likeMenName)){
            $likeOrNot="取消赞";
        }
        else $likeOrNot="赞";
        //unset($post['likeMenList']);

        $readMenIds = explode('|', ArrayHelper::getValue($post, 'readMenList'));
        $readMenCount = count($readMenIds);
        //unset($post['readMenList']);

        $newElements = array(
            'likeMenCount' => $likeMenCount,
            'readMenCount' => $readMenCount,
            'likeMenName' => $likeMenName,
            'likeOrNot'=>$likeOrNot,
            'islike'=>$islike,
        );
        return array_merge($post, $newElements);
    }


    public static function orderByTime()
    {
        $wholePostList = static::find()->where(['isPost' => 0])->asArray()->all();
        ArrayHelper::multisort($wholePostList, 'time', SORT_DESC);
        return array_map("static::parseSimpleInfo", $wholePostList);
        return $lastestPosts;
    }

    public static function orderByHot()
    {
        $simplePostList = Post::getSimplePosts();
        ArrayHelper::multisort($simplePostList, 'likeMenCount', SORT_DESC);
        return $simplePostList;
    }
    //解析回帖
    //需要优化!
    public static function getnextPosts($post)
    {
        $nextPostIds = explode('|', ArrayHelper::getValue($post, 'nextPostId'));
        $nextPosts = array();
        foreach ($nextPostIds as $nextpostid) {//删掉判断空，改为在保存时判断。
            if($nextpostid=='')continue;
            $nextPost = static::find()->where(['postId' => intval($nextpostid)])->asArray()->one();

            $nextPostManName = User::getUsernameById(ArrayHelper::getValue($nextPost, 'postManId'));
            $nextPostTalk = static::getTalk( ArrayHelper::getValue($nextPost, 'nextPostId'));
            $likeMenIds = explode('|', ArrayHelper::getValue($nextPost, 'likeMenList'));
            $likeMenName = array();
            $likeMenCount = count($likeMenIds);
            if ($likeMenCount == 1 && $likeMenIds[0] == '') {
                $likeMenCount = 0;
            } else {
                foreach ($likeMenIds as $likeMenId) {
                    if ($likeMenId == "") continue;
                    array_push($likeMenName, User::getUsernameById($likeMenId));
                }
            }
            if(in_array(User::getAppUserID(), $likeMenIds))$islike=true;
            else $islike=false;

            if(in_array(User::getUsernameById(User::getAppUserId()),$likeMenName)){
                $likeOrNot="取消赞";
            }
            else $likeOrNot="赞";
            $newElements = array(
                'postManName' => $nextPostManName,
                'talk' => $nextPostTalk,
                'likeOrNot'=>$likeOrNot,
                'islike'=>$islike,
            );

            array_push($nextPosts, array_merge($nextPost, $newElements));
        }
        //$nextPosts=array_map("static::parseSimpleInfo",$nextPosts);
        //Yii::warning($nextPosts);
        return $nextPosts;
    }


    public static function deleteMainPost($deleteMainPostId)
    {
        $needDeletePostIds = array();
        array_push($needDeletePostIds,$deleteMainPostId);
        $mainPost = static::find()->where(['postId' => $deleteMainPostId])->asArray()->one();
        $replyPostIds = explode('|', ArrayHelper::getValue($mainPost, 'nextPostId'));
        foreach($replyPostIds as $replyPostId)  {
            if($replyPostId=='')    continue;
            array_push($needDeletePostIds,$replyPostId);
            $replyPost = static::find()->where(['postId' => $replyPostId])->asArray()->one();
            $talkPostIds = explode('|', ArrayHelper::getValue($replyPost, 'nextPostId'));
            foreach($talkPostIds as $talkPostId)    array_push($needDeletePostIds,$talkPostId);
        }
        return static::deletePost($needDeletePostIds);
    }

    public static function deleteFollowPost($followPostId,$mainPostId)
    {
        static::deleteNextPostIdFromFatherPost($mainPostId,$followPostId);

        $needDeletePostIds = array();
        array_push($needDeletePostIds,$followPostId);

        $replyPost = static::find()->where(['postId' => $followPostId])->asArray()->one();
        $talkPostIds = explode('|', ArrayHelper::getValue($replyPost, 'nextPostId'));
        foreach($talkPostIds as $talkPostId)    array_push($needDeletePostIds,$talkPostId);

        return static::deletePost($needDeletePostIds);
    }

    public static function deleteTalkPost($talkPostId,$FollowPostId)
    {
        static::deleteNextPostIdFromFatherPost($FollowPostId,$talkPostId);

        $needDeletePostIds = array();
        array_push($needDeletePostIds,$talkPostId);
        return static::deletePost($needDeletePostIds);
    }

    //删除父帖中nextPostId中含有的子帖Id
    private static function deleteNextPostIdFromFatherPost($fatherPostId,$postId)
    {
        $fatherPost = Post::findOne($fatherPostId);
        $fatherPostNextId = ($fatherPost->nextPostId);
        $substr = "|".$postId;
        if(stripos($fatherPostNextId,$substr) === false) {
            $substr = $postId;
        }
        $fatherPost->nextPostId = ltrim(str_replace($substr,'',$fatherPostNextId),'|');
        $fatherPost->save();
    }
    //删除数组里面的帖子
    private static function deletePost($needDeletePostIds)
    {
        foreach($needDeletePostIds as $needDeletePostId)    {
            if($needDeletePostId == '') continue;
            $deletePost = Post::findOne($needDeletePostId);
            if($deletePost) $deletePost->delete();
        }
    }

    //解析talk
    private static function getTalk($nextPostTalkId)
    {
        $TalkIds = explode('|', $nextPostTalkId);
        $Talks = array();
        foreach ($TalkIds as $TalkId) {//invantal?
            if($TalkId=='')continue;
            $Talk = static::find()->where(['postId' => intval($TalkId)])->asArray()->one();
            if(!is_array($Talk))    continue;
            $TalkManName = User::getUsernameById(ArrayHelper::getValue($Talk, 'postManId'));

            $newElement = array('postManName' => $TalkManName);
            array_push($Talks, array_merge($Talk, $newElement));
        }
        return $Talks;
    }

}