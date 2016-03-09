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
?>

<ul>
    <?php
    foreach ($simplePosts as $simplePost) {
        //call_user_func(array("app\controllers\course\DiscussionController", "isPostDisplayable"),$simplePost);
        $postId = ArrayHelper::getValue($simplePost,'postId');
        echo(
            '<li class="'.(ArrayHelper::getValue($simplePost,'isRead')?hasread:unread).'" style="min-height: 100px; max-height: 100px; overflow: hidden;" onclick="showWholePost('.$postId.')"><div style="position: relative; ">
                                        <hr size="5" color="#202020"/>
                                        <div class="metadata" style="position:absolute;right:10px;top:10px;">
                                            <div class="timestamp">'. ArrayHelper::getValue($simplePost,'time').'</div>
                                        </div>');
        if(!ArrayHelper::getValue($simplePost,'isRead'))
            echo('<img id="unreadDot_'.$postId.'" src="https://piazza.com/images/piazza/dashboard/icon-unread-dot.png"  width="10" height="10" style="position:absolute;left:8px;top:40px;"></img>');
        echo(
            '<div class="content" style="position:absolute;left:32px;top:5px;right:7px">
                                            <div class="title ellipses">
                                                <div class="title_text" style="max-width: 235px;"><b>['. ArrayHelper::getValue($simplePost,'postManName').']:'.ArrayHelper::getValue($simplePost,'title').'</b></div>
                                            </div>
                                            <div class="snippet">'.ArrayHelper::getValue($simplePost,'content').'</div>
                                        </div>
                                    </div></li>'
        );
    }
    ?>
</ul>