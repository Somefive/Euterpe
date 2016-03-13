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
<?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor',
    [
        'clientOptions' => [
            //编辑区域大小
            'initialFrameHeight' => '200',
            //设置语言
            'lang' =>'en', //中文为 zh-cn
            //定制菜单
            'toolbars'=> [
                ['fullscreen', 'source', 'undo', 'redo','fontfamily','fontsize', 'bold', 'italic', 'underline', 'fontborder', 'strikethrough','justifyleft', 'justifyright','justifycenter','justifyjustify',  'superscript', 'subscript', 'removeformat', 'formatmatch',],
                [ 'emotion','spechars','snapscreen','simpleupload','insertimage',  'insertorderedlist', 'insertunorderedlist','|','blockquote', 'pasteplain','link','selectall', 'cleardoc']
            ]
        ]
    ]) ?>
<?= $form->field($model,'option')->checkboxList(['1' => '匿名 ', '2' => '屏蔽',]);?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
