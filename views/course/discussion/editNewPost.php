<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/7
 * Time: 20:23
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),
        [
            'clientOptions' => [
                'imageManagerJson' => ['/redactor/upload/image-json'],
                'imageUpload' => ['/redactor/upload/image'],
                'fileUpload' => ['/redactor/upload/file'],
                'lang' => 'zh_cn',
                'plugins' => ['clips', 'fontcolor','imagemanager','counter','fontfamily','limiter','textexpander'],
                'row' => '16'
            ]
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>