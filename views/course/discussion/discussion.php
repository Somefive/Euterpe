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
            <button class="btn btn-primary" onclick="getUnreadList()">unread</button><br/>
            <div id = "simplePostList" style="height:500px; overflow:auto;border:	#A0A0A0 solid thin;">
                    <?php echo \Yii::$app->view->renderFile('@app/views/course/discussion/simplePostList.php', [
                        'simplePosts' => $simplePosts,
                    ]); ?>
            </div>
        </div>
        <div id="areaShowInfo" class="col-md-8"></div>
    </div>
</div>
