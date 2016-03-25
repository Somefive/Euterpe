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
    public $editContent;//暂时接纳编辑信息，作为content的一个中转
    public $option;
    public $remindList;

    private $remindNames = array();
    private $remindNamesNeedSave = array();
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            $post->content = $this->dealAtListInContent($this->content);
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
                foreach($this->remindNamesNeedSave as $remindName)  {
                    if($remindName == "")   continue;
                    $remindedManId = User::getUserIdByName($remindName);
                    Remind::addRemindedData($remindedManId,$post->postId,  User::getAppUserID(), $post->postId);
                }
                return true;
           }
        }
        return false;
    }
    //找出content里面包含的@信息，并且进行更改与储存
    public function dealAtListInContent($content)
    {
        Yii::warning($content);
        $session = Yii::$app->session;
        $session->open();
        if($session['remindName'] != null)  {
            Yii::warning($session['remindName']);

            $remindNames =  explode('@', $session['remindName']);
            foreach($remindNames as $remindName) {
                if($remindName == "")   continue;
                $remindName = str_replace(' ','',$remindName);
                array_push($this->remindNames,$remindName);
            }


            $content = preg_replace_callback(
                "|(@<!--<start-->.*?<end>)|",
                array($this, 'dealAtName'),
                $content);

            $content = preg_replace_callback(
                "|(@</end><!--<start-->.*?<end>)|",
                array($this, 'dealAtName'),
                $content);
        }
        Yii::warning($content);
        return $content;
    }

    public function dealAtName($matches)
    {
        // 通常: $matches[0]是完成的匹配
        //$matches[1]的信息是<!--<start-->.*<end>
        Yii::warning($matches[1]);
        $result = "";
        preg_match("/<!--<start-->(.*)<end>/", $matches[1], $atInfo);
        $atNames =  explode('@',$atInfo[1]);
        foreach($atNames as $atName) {
            if($atName == "")   continue;
            $atName = str_replace(' ', '', $atName);

            Yii::warning("atName is ".$atName);
            Yii::warning($this->remindNames);

            if(in_array($atName,$this->remindNames))  {
                Yii::warning("is in");
                array_push($this->remindNamesNeedSave,$atName);
                $result .= ("<a>@".$atName."&nbsp;</a>");
            }
            else $result .= ("@".$atName);
        }
        return $result;
    }
}
