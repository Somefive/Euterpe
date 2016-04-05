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

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addWikiModal">添加Wiki</button>
        <button type="button" class="btn btn-primary">我的Wiki</button>
    </div>
    <br/><br/>
    <?php foreach($wikis as $wiki):?>
        <div class="panel panel-success" wikiid="<?=$wiki->id?>">
            <div class="panel-heading" folded="false"><span><?=$wiki->title?></span></div>
            <div class="panel-body"><?=$wiki->detail?></div>
            <div class="panel-footer">
                <?php
                    $tags = preg_split('/\s*;\s*/',(string)$wiki->tag);
                    foreach($tags as $tag)
                        if(!empty($tag))
                            echo "<span class='tag label label-info'>".$tag."</span>";
                ?>
            </div>
        </div>
    <?php endforeach ?>

<!--    <table class="table table-striped table-bordered" style="text-align: center;">-->
<!--        <thead>-->
<!--        <tr><td style="width: 200px;">Title</td><td>Content</td></tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php //foreach($wikis as $wiki){
//            $type = 'enter';
//            $text = '进入该Wiki';
//            echo('<tr class="tr-'.$type.'-wiki" data-toggle="tooltip" title="'.$text.'" style="cursor:pointer;" wikiid="'.$wiki->id.'"><td>'.$wiki->title.'</td><td>'.$wiki->detail.'</td></tr>');
//        }?>
<!--        </tbody>-->
<!--    </table>-->

    <div class="modal fade" id="addWikiModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">New Wiki</h4>
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
                    <input type="hidden" name="operate" value="create">
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
