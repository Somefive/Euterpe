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
$this->registerJsFile('/js/bootstrap-hover-dropdown.min.js');
$this->registerJsFile('/js/bootstrap-hover-dropdown.min.js');
$this->registerCssFile('/css/discussion.css');
$this->registerCssFile('/css/discussionSimpleList.css');
$this->registerCssFile('/css/discussionShowWholePost.css');
$this->registerCssFile('/css/prefixfree.css');
$this->registerCssFile('/css/css_load.css');

//等待迪迪决定去留
$this->registerCssFile('/css/style.css');
$this->registerCssFile('/css/icons.css');

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">

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

            <div id = "simplePostList" style="height:500px; overflow:auto;border:	#A0A0A0 solid thin;">
                    <?php echo \Yii::$app->view->renderFile('@app/views/course/discussion/simplePostList.php', [
                        'simplePosts' => $simplePosts,
                    ]); ?>
            </div>
        </div>

        <div id="areaShowInfo" class="col-md-8" >
            <div style=" margin-top:80px;margin-left:10px;">
                <?php /*echo \Yii::$app->view->renderFile('@app/views/course/discussion/remind.php', [
                    'remindedNum'=>$remindedNum,
                    'simplePosts' => $simplePosts,
                    'replyNum'=>$replyNum,
                ]);*/ ?>
                <ul>
                    <li  id="simpleRemind" >
                        <div style="position: relative; cursor:pointer;" title="view all information 查看详细信息" onclick="showWholeRemind(<?php $remindedNum?><?php $replyNum?>)">
                            <?php if($remindedNum==0)echo('<img src="https://piazza.com/images/piazza/dashboard/check.png"   style=""/>');
                                   else echo('<img src="https://piazza.com/images/piazza/dashboard/exclaim.png"  style=""/>');
                                   echo('&nbsp&nbsp'.$remindedNum.'个帖子中有人@你') ?>
                        </div>
                        <hr size="5" color="#202020"/>
                    </li>
                    <li  id="simpleRply"  >
                        <div style="position: relative; cursor:pointer;" title="view all information 查看详细信息"  onclick="showWholeRemind(<?php $remindedNum?><?php $replyNum?>)">
                            <?php if($replyNum==0)echo('<img src="https://piazza.com/images/piazza/dashboard/check.png"   style=""/>');
                                    else echo('<img src="https://piazza.com/images/piazza/dashboard/exclaim.png"  style=""/>');
                                echo('&nbsp&nbsp'.$replyNum.'个帖子中有人回复你') ?>
                        </div>
                    </li>
                </ul>
                </div>
        </div>
    </div>
</div>
