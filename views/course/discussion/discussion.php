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
            <button class="btn btn-primary" onclick="editNewPost()">New Post</button>
            <button class="btn btn-primary" id="unreadBtn" onclick="getUnreadList()">unread</button>
            <!--只看某个人帖子的下拉框-->
            <ul class="nav">
                <li class="dropdown" id="accountmenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Only View<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li onclick="getAllList()"><a>ALL POST</a></li>
                        <?php
                        foreach($allUsername as $username) {
                            echo('<li onclick="getSpecificManList(\''.$username.'\')"><a>'.$username.'</a></li>');
                            }
                        ?>
                    </ul>
                </li>
            </ul>
            <!--选择排序方法的下拉框-->
            <ul class="nav">
                <li class="dropdown" id="accountmenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">OrderBy<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li onclick="modifyOrderRule('orderByTime')"><a>Time</a></li>
                        <li onclick="modifyOrderRule('orderByHot')"><a>Hot</a></li>
                    </ul>
                </li>
            </ul><br/>
            <div id = "simplePostList" style="height:500px; overflow:auto;border:	#A0A0A0 solid thin;">
                    <?php echo \Yii::$app->view->renderFile('@app/views/course/discussion/simplePostList.php', [
                        'simplePosts' => $simplePosts,
                    ]); ?>
            </div>
        </div>

        <div id="areaShowInfo" class="col-md-8"></div>

    </div>
</div>

<!--script src="/js/discussion.js"></script>
<script type="text/javascript">
    $('#unreadBtn').click();
</script-->