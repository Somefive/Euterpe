<?php
/**
 * Created by PhpStorm.
 * User: bingochen
 * Date: 2016/2/28
 * Time: 23:30
 */
$this->title = 'Share 分享区';
$this->params['breadcrumbs'][] = ['label'=>'course','url'=>'/course/index'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="course-composer">
    <div style="margin: 15px;">
        <button class="btn btn-default" onclick="window.location='/course/share/create'">Create</button>
    </div>
</div>
