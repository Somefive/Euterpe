<?php
/**
 * Created by PhpStorm.
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Discussion';

$this->registerJsFile('/js/bootstrap-hover-dropdown.min.js');
$this->registerJsFile('/js/course/discussion/discussion.js');
$this->registerJsFile('/js/course/discussion/simplePostList.js');
$this->registerJsFile('/js/course/discussion/prefixfree.min.js');
$this->registerJsFile('/js/course/discussion/jquery.fly.min.js');
$this->registerJsFile('/js/course/discussion/requestAnimationFrame.js');

$this->registerCssFile('/css/discussion/discussion.css');
$this->registerCssFile('/css/discussion/simplePostList.css');
$this->registerCssFile('/css/discussion/showWholePost.css');
$this->registerCssFile('/css/discussion/editNewPost.css');
$this->registerCssFile('/css/discussion/css_load.css');
$this->registerCssFile('/css/discussion/prefixfree.css');
$this->registerCssFile('/css/discussion/changLike.css');

?>
<div class="container-fluid" style="background-image:url(/img/discussion/!4.jpg); background-attachment:fixed">
    <div class="row" >
        <div class="col-md-4" >
        <div id="nav" class="nav hidden-xs hidden-sm affix" data-spy="affix" >
            <i id="end"></i>
            <div id="hintPostSuccess">发帖成功！</div>

            <div>
                <!--只看unread或者all的下拉框-->
                <div class="btn-group">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10" aria-expanded="false">
                        Unread<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li onclick="getAllNorUnreadList()"><a>ALL POST</a></li>
                        <li onclick="getUnreadList()"><a>unread</a></li>
                    </ul>
                </div>
                <!--只看某人帖子的下拉框-->
                <div class="btn-group">
                    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10" aria-expanded="false">
                        View<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li onclick="getSpecificManList('var@ALL')"><a>ALL POST</a></li>
                        <?php
                        foreach($allUsername as $username) {
                            echo('<li onclick="getSpecificManList(\''.$username.'\')"><a>'.$username.'</a></li>');
                        }
                        ?>
                    </ul>
                </div>
                <!--选择排序方法的下拉框-->
                <div class="btn-group">
                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10" aria-expanded="false">
                        Order By<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li onclick="modifyOrderRule('orderByTime')"><a>Time</a></li>
                        <li onclick="modifyOrderRule('orderByHot')"><a>Hot</a></li>
                    </ul>
                </div>
                <!--发帖-->
                <div class="btn-group" id="newPostBtn">
                    <button class="btn btn-info" onclick="editNewPost()">
                        New
                        <span class="hvr-icon-forward"></span>
                    </button>
                </div>
            </div><br/>

            <div id = "simplePostList" style="height:480px; overflow:auto;border:#A0A0A0 solid thin;">               
                <ul id="simplePostUl">
                    <?php echo \Yii::$app->view->renderFile('@app/views/course/discussion/simplePostList.php', [
                        'simplePosts' => $simplePosts,
                    ]); ?>
                </ul>        
            </div>
        </div>
        </div>

        <div id="areaShowInfo" class="col-md-8" >
            <div style=" margin-top:55px;margin-left:10px;">
                <?php echo \Yii::$app->view->renderFile('@app/views/course/discussion/remind.php', [
                    'remindedNum'=>$remindedNum,
                    'talkNum'=>$talkNum,
                    'simplePosts' => $simplePosts,
                    'replyNum'=>$replyNum,
                    'Remind'=>$Remind,
                    'Reply'=>$Reply,
                    'Talk'=>$Talk,
                ]);?>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    if(<?=$need_show?>!=-1){        
       setTimeout(function() {
            if(document.all) {
                document.getElementById("li_postId_"+<?=$need_show?>).click();
            }
            else {
                var e = document.createEvent("MouseEvents");
                e.initEvent("click", true, true);
                document.getElementById("li_postId_"+<?=$need_show?>).dispatchEvent(e);
                //window.location.hash="li_postId_"+<?=$need_show?>;
            }
<<<<<<< HEAD
        }, 500); 
   }        

    </script>
=======
        }, 100); 
   }        
</script>
>>>>>>> 40a8901edcbfe64b02e2cc41a049d8e9d8df56d8
