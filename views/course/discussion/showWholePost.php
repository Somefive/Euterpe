<?php
/**
 * Created by PhpStorm.
 */
use yii\helpers\ArrayHelper;
?>

<div class="post_region_box question_note_view dashboard_element">
    <div class="post_region_header clearFix">
        <div class="post_icon note "></div>

        <div class="post_title">note</div>

        <div class="post_favorite is_not_favorite">
            <i class="icon_favorite is_favorite" onclick="PEM.fire('favorite', false);return false;"></i>
            <i class="icon_favorite not_favorite" onclick="PEM.fire('favorite', true);return false;" tutorial="Save this post to your favorites to find it later." original-title=""></i>
        </div>
        <div class="post_converted_message">Your question is now a note.<div class="post_converted_message_close">x</div></div>
        <div class="post_view_count"><span class="count"><?php echo(ArrayHelper::getValue($selectedPost,'readMenCount'));?></span> views</div>
        <a href="#" class="follow_link hide" onclick="PEM.fire('question_note_stop_follow');return false;">stop following</a>
    </div>
    <div class="post_region_content note" id="view_quesiton_note">

        <h1 class="post_region_title"><?php echo(ArrayHelper::getValue($selectedPost,'title'));?></h1>

        <div class="post_region_text" id="questionText">
            <p><?php echo(ArrayHelper::getValue($selectedPost,'content'));?></p>
            <p>&nbsp;</p>

            <p><?php echo(ArrayHelper::getValue($selectedPost,'time').'&nbsp');
                //echo('<img class="ui-icon icon-praise" src="http://os.qzonestyle.gtimg.cn/aoi/skin/sprite/35.32-man160203180152.png"  width="10" height="10" />');
                ?>
            <p>
           <?php
                    foreach (ArrayHelper::getValue($selectedPost,'likeMenName') as $likeMenName){
                        echo($likeMenName.',');
                    }
                    if(ArrayHelper::getValue($selectedPost,'likeMenCount')!=0)
                    echo('等共'.ArrayHelper::getValue($selectedPost,'likeMenCount').'人赞过');
                ?>
            </p>
        </div>
    </div>
</div>
<!--回复-->
<div id="clarifying_discussion" class="post_region_box clarifying_discussion dashboard_element">
    <div class="post_region_header clearFix">
        <div class="post_title">followup discussions</div>
        <div class="post_subtitle">for lingering questions and comments</div>
    </div>

    <div class="post_region_content clarifying_discussion">

        <h5 id="start_new_followup_header">Start a new followup discussion</h5>
        <?php echo(
            '<div class="compose_discussion" onclick="replyPost('.ArrayHelper::getValue($selectedPost,'postId').')" id="create_new_followup">Compose a new followup discussion</div>'
        );?>
        <div id="create_new_followup_div"></div>
    </div>
</div>

