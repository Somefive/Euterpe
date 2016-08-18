<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/3
 * Time: 17:15
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register main-content-middle">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to register:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div>{input}</div>\n<div>{error}</div>",
            'labelOptions' => ['class' => 'control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'repassword')->passwordInput() ?>


    <?= $form->field($model, 'email') ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::SubmitButton('Register', ['class' => 'btn btn-primary E-register', 'name' => 'register-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <?=Html::jsFile('@web/js/jquery-2.2.0.min.js')?>
    <?=Html::jsFile('@web/js/register.js')?>
</div>
