<?php
/**
 * Created by PhpStorm.
 * User: wjf
 * Date: 2016/3/19
 * Time: 15:35
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\account\User;
?>
<!-- This is a comment <div>
</div>-->


<div class="panel-group" id="reminderList" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default" >
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                    <?php if($remindedNum==0)echo('<img src="/img/discussion/check.png"   style=""/>');
                    else echo('<img src="/img/discussion/exclaim.png"  style=""/>');
                    echo('&nbsp&nbsp'.$remindedNum.'个帖子中有人@你');
                    ?>
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
            <div class="panel-body">
                <table class="table table-striped table-bordered" style="text-align: center;">
                    <thead>
                    <tr><td >@你的小伙伴 </td><td> 被@的帖子 </td></tr>
                    </thead>
                    <tbody>
                    <?php foreach($Remind as $RemindOne){ echo('<tr class="tr-enter-course" data-toggle="tooltip" title="enter the post 进入该帖子" style="cursor:pointer;" remindpostid="'.$RemindOne['RemindPostId'].'" onclick="deleteRemindedData('.User::getAppUserID().','.$RemindOne['RemindPostId'].','.$RemindOne['RemindedPostId'].')'.'"><td>'.$RemindOne['RemindManName'].'</td><td>'.$RemindOne['simpleInfo'].'</td></tr>'); } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default" >
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">
                    <?php if($replyNum==0)echo('<img src="/img/discussion/check.png"   style=""/>');
                    else echo('<img src="/img/discussion/exclaim.png"  style=""/>');
                    echo('&nbsp&nbsp'.$replyNum.'个帖子中有人回复你') ?>
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
            <div class="panel-body">
                <table class="table table-striped table-bordered" style="text-align: center;">
                    <thead>
                    <tr><td >回复你的小伙伴 </td><td> 回复你的帖子 </td></tr>
                    </thead>
                    <tbody>
                    <?php foreach($Reply as $ReplyOne){ echo('<tr class="tr-enter-course" data-toggle="tooltip" title="enter the post 进入该帖子" style="cursor:pointer;" replypostid="'.$ReplyOne['ReplyPostId'].'" onclick="deleteReplyedData('.User::getAppUserID().','.$ReplyOne['ReplyPostId'].','.$ReplyOne['ReplyedPostId'].')'.'"><td>'.$ReplyOne['ReplyManName'].'</td><td>'.$ReplyOne['simpleInfo'].'</td></tr>'); } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default" >
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsed">
                    <?php if($talkNum==0)echo('<img src="/img/discussion/check.png"   style=""/>');
                    else echo('<img src="/img/discussion/exclaim.png"  style=""/>');
                    echo('&nbsp&nbsp'.$talkNum.'个帖子在你的帖子下讨论');?>
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
            <div class="panel-body">
                <table class="table table-striped table-bordered" style="text-align: center;">
                    <thead>
                    <tr><td >讨论发帖的小伙伴 </td><td> 讨论的帖子 </td></tr>
                    </thead>
                    <tbody>
                    <?php foreach($Talk as $TalkOne){ echo('<tr class="tr-enter-course" data-toggle="tooltip" title="enter the post 进入该帖子" style="cursor:pointer;" replypostid="'.$TalkOne['TalkPostId'].'" onclick="deleteTalkData('.User::getAppUserID().','.$TalkOne['TalkPostId'].','.$TalkOne['ReplyedPostId'].')'.'"><td>'.$TalkOne['TalkManName'].'</td><td>'.$TalkOne['simpleInfo'].'</td></tr>'); } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


