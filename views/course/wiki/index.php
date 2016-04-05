<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/15
 * Time: 11:51
 */
use yii\helpers\Html;

$this->title = 'Wiki';
$this->params['breadcrumbs'][] = 'Index';
$wikis;
?>
<div class="wiki-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-success" onclick="window.location='/course/wiki/createwiki'">添加Wiki</button>
        <button type="button" class="btn btn-primary" onclick="window.location='/course/wiki/mywiki'">我的Wiki</button>
    </div>
    <br/><br/>
    <?php foreach($wikis as $wiki):?>
        <div class="panel panel-success" wikiid="<?=$wiki->id?>">
            <div class="panel-heading" folded="false"><span><?=$wiki->title?></span></div>
            <div class="panel-body"><?=$wiki->detail?></div>
            <div class="panel-footer">
                <?php
                    $tags = preg_split('/;/',(string)$wiki->tag);
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

    <?=Html::cssFile('/css/wiki/index.css');?>
    <?=Html::jsFile('@web/js/jquery-2.2.0.min.js')?>
    <?=Html::jsFile('@web/js/course/wikiindex.js')?>

</div>
