<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/9
 * Time: 15:25
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\controllers\course\DiscussionController;
use app\models\account\User;
?>
<ul id="simplePostUl">
<?php foreach ($simplePosts as $simplePost):?>
    <?php $postId = ArrayHelper::getValue($simplePost,'postId');?>
    <!--li class="hasread/unread postManName_$postManName anoymous/canview simplePost" id="li_postId_$postId" onclick="showWholePost($postId)"-->
    <li class="<?=(ArrayHelper::getValue($simplePost,'isRead')?hasread:unread)?> postManName_<?=ArrayHelper::getValue($simplePost,'postManName')?> <?=((ArrayHelper::getValue($simplePost,'anoymous')==1)?anoymous:canview)?> simplePost hvr-wobble-vertical" id="li_postId_<?=ArrayHelper::getValue($simplePost,'postId')?>" style="min-height: 100px; max-height: 100px; overflow: hidden;" onclick="showWholePost(<?=$postId?>)">
        <div style="position: relative; cursor:pointer;">
            <hr size="5" color="#202020"/>

            <div class="metadata" style="position:absolute;right:10px;top:6px;">
                <div class="timestamp"><?=ArrayHelper::getValue($simplePost,'time')?></div>
            </div>

            <?php
            if(!ArrayHelper::getValue($simplePost,'isRead'))
                echo('<img id="unreadDot_'.$postId.'" src="/img/discussion/unread-dot.png"  width="10" height="10" style="position:absolute;left:8px;top:20px;"></img>');
            ?>

            <?php if (ArrayHelper::getValue($simplePost, 'anoymous') == 1):?>
                <div class="content" style= "position:absolute;left:32px;top:5px;right:7px">
                        <div class="title ellipses">
                            <div class="title_text" style="max-width: 235px;"><b>[Anoymous]:<?= ArrayHelper::getValue($simplePost, 'title')?></b></div>
                        </div>
                        <div class="snippet"><?=ArrayHelper::getValue($simplePost, 'content')?></div>
                 </div>
            <?php else:?>
                 <div class="content" style= "position:absolute;left:32px;top:5px;right:7px">
                        <div class="title ellipses">
                            <div class="title_text" style="max-width: 235px;"><b>[<?=ArrayHelper::getValue($simplePost, 'postManName')?>]:<?=ArrayHelper::getValue($simplePost, 'title')?></b></div>
                        </div>
                        <div class="snippet"><?=ArrayHelper::getValue($simplePost, 'content')?></div>
                 </div>
            <?php endif?>

         </div>
    </li>
<?php endforeach;?>
</ul>