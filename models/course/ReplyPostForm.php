<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/10
 * Time: 15:57
 */

namespace app\models\course;


use yii\base\Model;
use app\models\account\User;
use yii\helpers\ArrayHelper;

class ReplyPostForm extends Model
{
    public $option;
    public $content;
    public function rules()
    {
        return [
            [[ 'content'], 'required'],
        ];
    }
    public function addReplyPost($fatherPostId,$postType)
    {
        if ($this->validate()) {
            $post = new Post();
            $post->postManId = User::getAppUserID();
            $post->content = $this->content;
            $post->time = date("Y-m-d H:i:s", time());
            $post->isPost=$postType;

            if($_POST['NewPostForm']['option']['0']==1) $post->anoymous=1;
            else $post->anoymous=0;
            if($_POST['NewPostForm']['option']['0']==2 or$_POST['NewPostForm']['option']['1']==2) $post->shieldteacher=2;
            else $post->shieldteacher=0;

            $postManName = User::getAppUser()->getUserName();
            $post->simpleInfo = $postManName;
/*
        $selectedPost = Post::findOne($postId);
        if(User::getAppUserID() == $selectedPost->postManId)
            return;
        $selectedPost->readMenList = ($selectedPost->readMenList.'|'.User::getAppUserID());
        $selectedPost->save();
*/
            if($post->save())   {

                $fatherPost = Post::findOne($fatherPostId);
                if(!$fatherPost->nextPostId) $fatherPost->nextPostId=$post->postId;
                else $fatherPost->nextPostId = ($fatherPost->nextPostId.'|'.$post->postId);
                if($post->isPost==1)Remind::addReplyedOfA($fatherPost->postManId,$fatherPostId,$post->postManId,$post->postId);
                if($post->isPost==2)Remind::addReplyedOfB($fatherPost->postManId,$fatherPostId,$post->postManId,$post->postId);
                return $fatherPost->save();
            }
            else return false;

        }
        return false;
    }

}