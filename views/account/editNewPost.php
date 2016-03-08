<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/7
 * Time: 20:23
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
?>
<div >

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?=Html::jsFile('@web/js/jquery-2.2.0.min.js')?>
    <?=Html::jsFile('@web/js/register.js')?>
</div>
