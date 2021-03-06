<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/7
 * Time: 20:23
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\account\User;
$this->registerJsFile('/js/course/discussion/editnewPost.js');
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput(['autofocus' => 'autofocus']) ?>
<?= $form->field($model, 'editContent')->widget(\yii\redactor\widgets\Redactor::className(),
    [
        'clientOptions' => [
            'imageManagerJson' => ['/redactor/upload/image-json'],
            'imageUpload' => ['/redactor/upload/image'],
            'fileUpload' => ['/redactor/upload/file'],
            'lang' => 'zh_cn',
            'plugins' => ['clips', 'fontcolor','imagemanager','counter','fontfamily','limiter','textexpander','fullscreen','vedio'],
        ],
        'options' => [

        ]
    ]
) ?>
<input type='text' id='contentLoader' name='content' value='' style='display: none;'>
<?= $form->field($model,'option')->checkboxList(['1' => '匿名 ', '2' => '屏蔽',]);?>
    <div class="form-group" id="formgroup"  >
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary','id'=>'submit']) ?>
    </div>
<?php ActiveForm::end(); ?>


<div class="modal fade" id = "remindList" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">@...</h4>
            </div>
            <div class="modal-body">
                <?= $form->field($model, 'remindList')->checkboxList($allUsername,['class'=>'atList']);?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button"  class="btn btn-primary" onclick="getSelectedRemindName()">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    宝贝儿！！！
                </h4>
            </div>
            <div class="modal-body">
                您有未提交的内容，是否离开？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="yes"
                        data-dismiss="modal">是
                </button>
                <button type="button" class="btn btn-primary" id="no"
                        data-dismiss="modal" >
                    否
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div>
