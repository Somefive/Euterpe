<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/2
 * Time: 16:45
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '账户中心 Account Index';
?>
<div class="account-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <style type="text/css">
        .row {margin: 10px;}
    </style>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        课程信息 Course Information
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <table class="table table-striped table-bordered" style="text-align: center;">
                        <thead>
                            <tr><td style="width: 200px;">课程名称 Course Name</td><td>课程简介 Course Introduction</td></tr>
                        </thead>
                        <tbody>
                            <?php foreach($studentcourses as $course){ echo('<tr class="tr-enter-course" data-toggle="tooltip" title="enter the course 进入该课程" style="cursor:pointer;" courseid="'.$course->id.'"><td>'.$course->name.'</td><td>'.$course->description.'</td></tr>'); } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        个人信息修改 Personal Information Modification
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon">School</span>
                                <select class="form-control" id="input-basic-information-school">
                                    <option value="Tsinghua" <?=$basicInformation->school=="Tsinghua"?"selected":""?>>Tsinghua University</option>
                                    <option value="Other" <?=$basicInformation->school!="Tsinghua"?"selected":""?>>Other University</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon">SchoolID</span>
                                <input type="text" class="form-control" id="input-basic-information-schoolid" value="<?=$basicInformation->schoolid?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon" id="description-chinese-name">Chinese Name</span>
                                <input type="text" class="form-control" aria-describedby="description-chinese-name" id="input-basic-information-chname" value="<?=$basicInformation->chname?>">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon" id="description-english-name">English Name</span>
                                <input type="text" class="form-control" aria-describedby="description-english-name" id="input-basic-information-enname" value="<?=$basicInformation->enname?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon">Gender</span>
                                <select class="form-control" id="input-basic-information-gender">
                                    <option value="male" <?=$basicInformation->gender=="male"?"selected":""?>>Male</option>
                                    <option value="female" <?=$basicInformation->gender!="male"?"selected":""?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon" id="description-tel">Tel</span>
                                <input type="text" class="form-control" aria-describedby="description-tel" id="input-basic-information-tel" value="<?=$basicInformation->tel?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="btn btn-success" id="input-basic-information-submit">Modify</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        账户信息修改 Account Information Modification
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-addon">New Password</span>
                            <input type="password" class="form-control" id="input-password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-addon">Repeat Password</span>
                            <input type="password" class="form-control" id="input-repassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input type="email" class="form-control" id="input-email" value="<?=\Yii::$app->user->identity->email?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="btn btn-success" id="input-account-submit">Modify</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?=Html::jsFile('@web/js/jquery-2.2.0.min.js')?>
    <?=Html::jsFile('@web/js/account/index.js')?>

</div>
