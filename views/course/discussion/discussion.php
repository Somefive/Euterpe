<?php
/**
 * Created by PhpStorm.
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Discussion';
$this->params['breadcrumbs'] = [
    ['label'=>'course','url'=>'/course/index'],
    ['label'=>'discussion','url'=>'/course/discussion/index'],
    $this->title
];
$this->registerJsFile('/js/discussion.js');
$this->registerCssFile('/css/discussion.css');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-primary" onclick="editNewPost()">New Post</button><br/><br>
            <div style="height:500px; overflow:auto;border:	#A0A0A0 solid thin;">
                <ul style="">
                    <?php
                        foreach ($simplePosts as $simplePost) {
                            $postId = ArrayHelper::getValue($simplePost,'postId');
                            echo(
                                '<li style="min-height: 100px; max-height: 100px; overflow: hidden;" onclick="showWholePost('.$postId.')"><div style="position: relative; ">
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
            </div>
        </div>
        <div id="areaShowInfo" class="col-md-8"></div>
    </div>
</div>
