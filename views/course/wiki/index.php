<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/15
 * Time: 11:51
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Wiki';
$this->params['breadcrumbs'][] = 'Index';
$wikis;
?>
<div class="wiki-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <span style="float:right;">
        <form method="get">
            <div class="input-group">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-success newwiki">New Wiki <span class="glyphicon glyphicon-leaf" aria-hidden="true"></span></button>
                </span>
                <input type="text" name="query" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" type="button">Search!</button>
                </span>
            </div>
        </form>
    </span>

    <br/><br/>
    <?php foreach($wikis as $wiki):?>
        <div class="panel panel-success" wikiid="<?=$wiki->id?>">
            <div class="panel-heading">
                <span class="panel-title"><?=Html::encode($wiki->title)?></span>
                <span class="editbar glyphicon glyphicon-resize-small foldbtn" aria-hidden="true" folded="false" data-toggle="tooltip" data-placement="top" title="Resize"></span>
                <?php if($wiki->studentid==\app\models\account\User::getAppUserID()): ?>
                    <span class="editbar glyphicon glyphicon-pencil editbtn" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></span>
                    <span class="editbar glyphicon glyphicon-trash deletebtn" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete"></span>
                <?php endif?>
                <span class="editbar glyphicon glyphicon-heart favorbtn" aria-hidden="true"><?=$wiki->favor?></span>
            </div>
            <div class="panel-body"><?=Html::encode($wiki->detail)?></div>
            <div class="panel-footer">
                <?php
                    $tags = preg_split('/\s*;\s*/',(string)$wiki->tag);
                    foreach($tags as $tag)
                        if(!empty($tag))
                            echo "<span class='tag label label-info'>".Html::encode($tag)."</span>";
                ?>
            </div>
            <div class="panel-tag" hidden><?=Html::encode($wiki->tag)?></div>
        </div>
    <?php endforeach ?>

    <div class="modal fade" id="WikiModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Wiki Editor</h4>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'wiki-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}<br/><div class=\"col-lg-12\">{input}</div><br/><div class=\"col-lg-12\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-3'],
                        ],
                    ]); ?>
                    <?= $form->field($focuswiki, 'title')?>
                    <?= $form->field($focuswiki, 'detail')->textarea(['rows'=>5])?>
                    <?= $form->field($focuswiki, 'tag')?>
                    <?= $form->field($focuswiki, 'studentid')->hiddenInput()?>
                    <?= $form->field($focuswiki, 'id')->hiddenInput()?>
                    <input type="hidden" id="operateID" name="operate" value="create">
                    <?php ActiveForm::end() ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="focuswikisubmit">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <?=Html::cssFile('/css/wiki/index.css');?>
    <?=Html::jsFile('@web/js/jquery-2.2.0.min.js')?>
    <?=Html::jsFile('@web/js/course/wikiindex.js')?>

</div>
