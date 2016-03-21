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
    public $option;
    public $remindList;
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
            //初始化阅读者列表
            $post->readMenList = $post->postManId;
            $post->isPost=0;
            Yii::warning($_POST['NewPostForm']);
            if($_POST['NewPostForm']['option']['0']==1) $post->anoymous=1;
            else $post->anoymous=0;
            if($_POST['NewPostForm']['option']['0']==2 or $_POST['NewPostForm']['option']['1']==2) $post->shieldteacher=2;
            else $post->shieldteacher=0;
            $postManName = User::getAppUser()->getUserName();
            $simpleTime = substr($post->time,0,10);

            $post->simpleInfo =$post->postManId.'|'. $postManName.'|'.$this->title.'|'.substr($this->content,0,100).'|'.$simpleTime.'|'.$post->anoymous.'|'.$post->shieldteacher;

            if($post->save())   {
                $session = Yii::$app->session;
                $session->open();
                if($session['remindName'] != null)  {
                    $remindNames =  explode('@', $session['remindName']);
                    foreach($remindNames as $remindName) {
                        if($remindName == "")   continue;
                        $remindName = str_replace(' ','',$remindName);
                        //Yii::warning($remindName);
                        $remindedManId = User::getUserIdByName($remindName);
                        //Yii::warning($remindedManId);
                        Remind::addRemindedData($remindedManId,$post->postId,  User::getAppUserID(), $post->postId);
                    }
                    return true;
                }
                return true;
            }
        }
        return false;
    }
}
