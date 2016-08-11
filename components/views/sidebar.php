<?php
$user = Yii::$app->user->identity;
$userinfo = $user->getInfo();
$username = $user->username;
$gender = ($userinfo && $userinfo->gender == "female")? "female":"male";
?>
<style>
    .sidebar{
        width: 240px;
        height: 100%;
        min-height: 300px;
        background-image: linear-gradient(270deg,LightSkyBlue,MediumSlateBlue);
        color: white;
        float: left;
    }
    .sidebuttons{
        padding-top: 20px;
        padding-left: 10px;
        width: 215px;
        float: left;
        height: 100%;
    }
    .sidearrow{
        width: 25px;
        float: right;
        height: 100%;
    }
    .sidearrow.up{
        height:45%;
    }
    .sidebar-btn{
        width: 100%;
        font-size: 16px;
        padding: 5px 15px;
        text-align: center;
        margin: 10px 0;
        border-radius:5px;
    }
    .sidebar-text:hover{
        cursor: pointer;
    }
    .sidebar-img{
        padding-left: 10px;
    }
</style>
<div class="sidebar" data-value="unfold">
    <div class="sidebuttons">
        <div class="sidebar-img">
            <img src="/img/account/<?=$gender?>.jpg" height="180px" style="border-radius: 10px;"/>
        </div>
        <div class="sidebar-btn sidebar-text" href="/account/"><?=$username?></div>
        <div class="sidebar-btn sidebar-text">Notification&nbsp;<span class="glyphicon glyphicon-envelope"></span></div>
        <div class="sidebar-btn sidebar-text">Composer&nbsp;<span class="glyphicon glyphicon-edit"></span></div>
        <div class="sidebar-btn sidebar-text">Discussion&nbsp;<span class="glyphicon glyphicon-comment"></span></div>
        <div class="sidebar-btn sidebar-text">Materials&nbsp;<span class="glyphicon glyphicon-book"></span></div>
        <div class="sidebar-btn sidebar-text">Wiki&nbsp;<span class="glyphicon glyphicon-tags"></span></div>
    </div>
    <div class="sidearrow">
        <div class="sidearrow up"></div>
        <div class="glyphicon glyphicon-resize-small resize-sidebar sidebar-text" aria-hidden="true" style="font-size:23px; margin-top: 45%; margin-bottom: 45%"></div>
    </div>
</div>
<?php
use yii\helpers\Html;
echo Html::jsFile("@web/js/euterpe/sidebar.js");
?>