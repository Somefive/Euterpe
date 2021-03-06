<?php
/**
 * Created by PhpStorm.
 */
use yii\helpers\ArrayHelper;
use app\models\account\User;
$this->registerJsFile('/js/course/discussion/showWholePost.js');
?>
<div class="post_region_box question_note_view dashboard_element ">
    <div class="post_region_header clearFix">
        <div class="post_title">note</div>
        <div class="post_view_count"><span class="count"><?php echo(ArrayHelper::getValue($selectedPost,'readMenCount'));?></span> views</div>
    </div>
    <div class="post_region_content note" id="view_quesiton_note">
        <h1 class="post_region_title"><?php echo(ArrayHelper::getValue($selectedPost,'title'));?></h1>
        <div class="post_region_text" id="questionText">
            <p><?php echo(ArrayHelper::getValue($selectedPost,'content'));?></p>
            <p>&nbsp;</p>

            <p><div><div style="float:left; width:150px; margin-top:15px;"><?=ArrayHelper::getValue($selectedPost,'time')?></div>
             <div style="float:left" id="like_<?=(ArrayHelper::getValue($selectedPost,'postId'))?>"
               onclick="changeLike('<?=User::getUsernameById(User::getAppUserId())?>',<?=ArrayHelper::getValue($selectedPost,'postId')?>)">
               <div class="heart" id="like1_<?=ArrayHelper::getValue($selectedPost,'postId')?>"<?php
                 if(ArrayHelper::getValue($selectedPost,'islike'))echo('rel="like" style="background-position:right">');
                 else echo('rel="unlike" style="background-position:left">');
                 ?></div>
                    </div></div>

            </p>
            <br/>
            <p>
                <div id="name<?=ArrayHelper::getValue($selectedPost,'postId')?>" align ="left">
                <?php
                $x=0;
                foreach (ArrayHelper::getValue($selectedPost,'likeMenName') as $likeMenName){
                    $x++;
                    if($x==ArrayHelper::getValue($selectedPost,'likeMenCount'))echo($likeMenName);
                    else echo($likeMenName.',');
                }
                if(ArrayHelper::getValue($selectedPost,'likeMenCount')!=0)
                    echo('等共'.ArrayHelper::getValue($selectedPost,'likeMenCount').'人赞过');
                //print_r($replyPosts);
                ?>
            </div>
           <!--删除帖子-->
            <?php if(ArrayHelper::getValue($selectedPost,'postManId') == User::getAppUserID()):?>
            <div align="right"> <a class="deleteLink" onclick="deletePost(0,-1,<?=ArrayHelper::getValue($selectedPost,'postId')?>)">删除</a></div>
            <?php endif?>
            </p>

        </div>
    </div>
</div>
<!--回复-->
<div id="clarifying_discussion" class="post_region_box clarifying_discussion dashboard_element">
    <div class="post_region_header clearFix">
        <div class="post_title">followup discussions</div>
    </div>

    <div class="follow_all post_region_content clarifying_discussion ">
        <!--B型帖子-->
        <?php foreach ($replyPosts as $replyPost): ?>
        <div class="follow_one clarifying_discussion clearFix" id="follow_post_<?=(ArrayHelper::getValue($replyPost,'postId'))?>">
            <div class="follow_body main_followup clearFix">
                <div>
                    <div style="float:left; margin-top:15px;">
                    <span class="talk_name"><?= ArrayHelper::getValue($replyPost,'postManName') ?></span>
                    <span title="talk_time"><?= ArrayHelper::getValue($replyPost,'time') ?></span>
                        </div>
                    <!--点赞-->
                    <div style="float:left" id="like_<?=(ArrayHelper::getValue($replyPost,'postId'))?>"
                         onclick="changeLike('<?=User::getUsernameById(User::getAppUserId())?>',<?=ArrayHelper::getValue($replyPost,'postId')?>)">
                        <div class="heart" id="like1_<?=ArrayHelper::getValue($replyPost,'postId')?>"
                            <?php
                            if(ArrayHelper::getValue($replyPost,'islike'))echo('rel="like" style="background-position:right">');
                            else echo('rel="unlike" style="background-position:left">');
                            ?>
                        </div>
                    </div>
                <!--删除帖子-->
                <div style="float:right;margin-top:15px;">
                <?php if(ArrayHelper::getValue($replyPost,'postManId') == User::getAppUserID()):?>
                    <a class="deleteLink" onclick="deletePost(1,<?=ArrayHelper::getValue($selectedPost,'postId')?>,<?=ArrayHelper::getValue($replyPost,'postId')?>)">删除</a>
                <?php endif?>
            </div>
                </div>
            <br/>
                    <span class="actual_text post_region_text"><p><?= ArrayHelper::getValue($replyPost,'content') ?></p></span>



            </div>

           <!--talk区域-->
            <div class="discussion_replies clearFix talk_all">
                <?php $talks = ArrayHelper::getValue($replyPost,'talk');?>
                <?php foreach ($talks as $talk): ?>
                <div class="talk_one" style="child-align: right" id="talk_post_<?=ArrayHelper::getValue($talk,'postId')?>">
                    <div class="talk_name_and_time">
                        <span class="talk_name"><?= ArrayHelper::getValue($talk,'postManName') ?></span>
                        <span class="talk_time"><?= ArrayHelper::getValue($talk,'time') ?></span>
                        <!--删除帖子-->
                        <?php if(ArrayHelper::getValue($talk,'postManId') == User::getAppUserID()):?>
                            <a class="deleteLink" onclick="deletePost(2,<?=ArrayHelper::getValue($replyPost,'postId')?>,<?=ArrayHelper::getValue($talk,'postId')?>)">删除</a>
                        <?php endif?>
                    </div>
                    <div class="chat_content_top"><?= ArrayHelper::getValue($talk,'content') ?></div>
                </div>
                <?php endforeach; ?>
            </div>


            <!--talk回复-->
            <div class="compose_reply clearFix start_reply" id="start_reply_followup_<?= ArrayHelper::getValue($replyPost,'postId')?>"
                 onclick="replyPost(<?=ArrayHelper::getValue($selectedPost,'postId')?>,2,'start_reply_followup_<?= ArrayHelper::getValue($replyPost,'postId')?>','create_reply_followup_<?=  ArrayHelper::getValue($replyPost,'postId')?>',<?= ArrayHelper::getValue($replyPost,'postId')?>)">
                Talk:
            </div>
            <!--下面的div原先class="discussion_replies new edit_mode"，但是这样却没办法显示，暂时去掉-->
            <div id="create_reply_followup_<?=  ArrayHelper::getValue($replyPost,'postId')?>">
                <!--div class="account_image_container">
                    <div class="user_pic user_pic_ie7xy8iscsw1t7"><div class="white_border"><img title="吴行行" src="https://dvngeac8rg9mb.cloudfront.net/images/dashboard/common/default_user.png" onload="onImageLoad(event);" width="0" height="0" style="display: block; width: 0px; height: 0px; left: 0px;"></div></div>
                </div-->
                <!--div class="discussion_content edit_mode clearFix" ></div-->
            </div>
        </div>
        <?php endforeach; ?>
        <!--回复A贴-->
        <h5 id="start_new_followup_header">Start a new followup discussion</h5>
        <div class="compose_discussion" onclick="replyPost(<?=ArrayHelper::getValue($selectedPost,'postId')?>,1,'create_new_followup','create_new_followup_div')" id="create_new_followup">Compose a new followup discussion</div>
        <div id="create_new_followup_div"></div>
    </div>
</div>
