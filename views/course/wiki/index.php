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

    <?php for($i=10*$page-10;$i<count($wikis) && $i<10*$page;$i++):?>
        <?= \app\components\wiki\WikiCard::widget(["wiki"=>$wikis[$i]]) ?>
    <?php endfor ?>

    <?= \app\components\LinkPager::widget(["total"=>ceil(count($wikis)/10),"current"=>$page,"url"=>"/course/wiki/index?query=".$query]); ?>

    <?=Html::cssFile('/css/wiki/wiki-card.css');?>
    <?=Html::jsFile('/js/course/wiki/wiki-card.js')?>
    <?=Html::jsFile('@web/js/course/wikiindex.js')?>

</div>
