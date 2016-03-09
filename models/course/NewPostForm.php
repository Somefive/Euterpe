<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/7
 * Time: 21:37
 */
namespace app\models\course;

use app\models\account\User;
use yii\base\Model;
use Yii;

class NewPostForm extends Model
{
    public $title;
    public $content;

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
        ];
    }

    /*public function attributeLabels()
    {
        return [
            'title' => 'title',
            'content' => 'content'
        ];
    }*/

    public function addPost()
    {
        if ($this->validate()) {
            $post = new Post();
            $post->postManId = User::getAppUserID();
            $post->title = $this->title;
            $post->content = $this->content;
            $post->time = date("Y-m-d H:i:s", time());

            $postManName = User::getAppUser()->getUserName();
            $simpleTime = substr($post->time,0,10);

            $post->simpleInfo =$post->postManId.'|'. $postManName.'|'.$this->title.'|'.substr($this->content,0,100).'|'.$simpleTime;

            return $post->save();
        }
        return false;
    }
}
