<?php
/**
 * Created by PhpStorm.
 */
$this->title = 'Discussion';
$this->params['breadcrumbs'][] = ['label'=>'course','url'=>'/course/index'];
$this->params['breadcrumbs'][] = $this->title;
?>
<h2>Discussion</h2>
<div >
    <a href="http://localhost:8080/course/discussion/test">article</a>
</div>
<div id="main"><?php echo $data;?></div>
