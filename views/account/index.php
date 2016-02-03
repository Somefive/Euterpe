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
                            <?php foreach($studentcourses as $course){ echo('<tr class="tr-enter-course" style="cursor:pointer;" courseid="'.$course->id.'"><td>'.$course->name.'</td><td>'.$course->description.'</td></tr>'); } ?>
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
                    <p>Please fill out the following fields to modify:</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'studentbasicinformation-form',
                        'action' => '/account/studentbasicinformationmodify/',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
                    ]); ?>

                    <?= $form->field($studentbasicinformationform, 'school')->dropDownList(['Tsinghua'=>'Tsinghua University 清华大学','Other'=>'Other 其他']); ?>

                    <?= $form->field($studentbasicinformationform, 'schoolid') ?>

                    <?= $form->field($studentbasicinformationform, 'chname') ?>

                    <?= $form->field($studentbasicinformationform, 'enname') ?>

                    <?= $form->field($studentbasicinformationform, 'gender')->dropDownList(['male'=>'male 男','female'=>'female 女','robot'=>'robot 机器人']); ?>

                    <?= $form->field($studentbasicinformationform, 'tel') ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::Submitbutton('Modify', ['class' => 'btn btn-primary E-studentbasicinformationmodify', 'name' => 'studentbasicinformationmodify-button']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
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

                    <p>Please fill out the following fields to modify:</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'account-form',
                        'action' => '/account/accountmodify/',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
                    ]); ?>

                    <?= $form->field($accountform, 'username')->textInput(['disabled'=>'true']) ?>

                    <?= $form->field($accountform, 'password')->passwordInput() ?>

                    <?= $form->field($accountform, 'repassword')->passwordInput() ?>

                    <?= $form->field($accountform, 'email')->textInput() ?>

                    <?= $form->field($accountform, 'oldemail')->hiddenInput() ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::Button('Modify', ['class' => 'btn btn-primary E-accountmodify', 'name' => 'accountmodify-button']) ?>
                            <?= Html::Button('Reset', ['class' => 'btn btn-primary E-accountreset', 'name' => 'accountreset-button']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

    <?=Html::jsFile('@web/js/jquery-2.2.0.min.js')?>
    <?=Html::jsFile('@web/js/account/index.js')?>

</div>
