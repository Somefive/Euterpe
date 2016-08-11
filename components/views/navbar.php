<?php
$user = Yii::$app->user;
?>
<style>
    .navbar{
        background-image: linear-gradient(0deg,SlateBlue,DarkSlateBlue);
        border: 0;
        margin: 0;
    }
    .nav-text{
        color: Lavender !important;
    }
    .nav-text:hover{
        color: white !important;
    }
    .container-fluid{
        padding-left:80px;
        padding-right:80px;
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <a class="nav-text navbar-brand" href="/">Euterpe</a>
        <ul class="nav navbar-nav navbar-right">
            <?php if($user->isGuest): ?>
                <li><a class="nav-text" href="/account/register">Register&nbsp;<span class="glyphicon glyphicon-record"></span></a></li>
                <li><a class="nav-text" href="/account/login">Login&nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li>
            <?php else: ?>
                <li><a class="nav-text" href="/account/logout">Logout&nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
            <?php endif ?>
        </ul>
    </div>
</nav>