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
    <ul>
        <?php /*foreach($Remind as $RemindOne): ?>
        <li><?php echo($RemindOne) ?></li>
        <?php endforeach;*/ ?>
    </ul>
</div>-->

<div style="">
<div class="panel-group" id="reminderList" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default" style="width:750px">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <?php echo('下列帖子中有人@你')      ?>
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <table class="table table-striped table-bordered" style="text-align: center;">
                    <thead>
                    <tr><td width="200px">@你的小伙伴 </td><td> 被@的帖子 </td></tr>
                    </thead>
                    <tbody>
                    <?php foreach($Remind as $RemindOne){ echo('<tr class="tr-enter-course" data-toggle="tooltip" title="enter the post 进入该帖子" style="cursor:pointer;" remindpostid="'.$RemindOne['RemindPostId'].'" onclick="deleteRemindedData('.User::getAppUserID().','.$RemindOne['RemindPostId'].','.$RemindOne['RemindedPostId'].')'.'"><td>'.$RemindOne['RemindManName'].'</td><td>'.$RemindOne['simpleInfo'].'</td></tr>'); } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default" style="width:750px">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <?php echo('下列帖子中有人回复你')      ?>
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <table class="table table-striped table-bordered" style="text-align: center;">
                    <thead>
                    <tr><td width="200px">回复你的小伙伴 </td><td> 回复你的帖子 </td></tr>
                    </thead>
                    <tbody>
                    <?php foreach($Reply as $ReplyOne){ echo('<tr class="tr-enter-course" data-toggle="tooltip" title="enter the post 进入该帖子" style="cursor:pointer;" replypostid="'.$ReplyOne['ReplyPostId'].'" onclick="deleteReplyedData('.User::getAppUserID().','.$ReplyOne['ReplyPostId'].','.$ReplyOne['ReplyedPostId'].')'.'"><td>'.$ReplyOne['ReplyManName'].'</td><td>'.$ReplyOne['simpleInfo'].'</td></tr>'); } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default" style="width:750px">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <?php echo('下列帖子中有人讨论')      ?>
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <table class="table table-striped table-bordered" style="text-align: center;">
                    <thead>
                    <tr><td width="200px">讨论发帖的小伙伴 </td><td> 讨论的帖子 </td></tr>
                    </thead>
                    <tbody>
                    <?php foreach($Talk as $TalkOne){ echo('<tr class="tr-enter-course" data-toggle="tooltip" title="enter the post 进入该帖子" style="cursor:pointer;" replypostid="'.$TalkOne['TalkPostId'].'" onclick="deleteTalkData('.User::getAppUserID().','.$TalkOne['TalkPostId'].','.$TalkOne['ReplyedPostId'].')'.'"><td>'.$TalkOne['TalkManName'].'</td><td>'.$TalkOne['simpleInfo'].'</td></tr>'); } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

