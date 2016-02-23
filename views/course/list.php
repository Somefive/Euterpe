<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/4
 * Time: 11:37
 */
use yii\helpers\Html;

$this->title = 'Course List 课程列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-list">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-striped table-bordered" style="text-align: center;">
        <thead>
            <tr><td style="width: 200px;">课程名称 Course Name</td><td>课程简介 Course Introduction</td></tr>
        </thead>
        <tbody>
            <?php foreach($courses as $course){
                $type = $course->enrolled?'enter':'enroll';
                $text = $course->enrolled?'enter the course 进入该课程':'enroll the course 报名该课程';
                echo('<tr class="tr-'.$type.'-course" data-toggle="tooltip" title="'.$text.'" style="cursor:pointer;" courseid="'.$course->id.'"><td>'.$course->name.'</td><td>'.$course->description.'</td></tr>');
            }?>
        </tbody>
    </table>

    <?=Html::jsFile('@web/js/jquery-2.2.0.min.js')?>
    <?=Html::jsFile('@web/js/course/list.js')?>

</div>
