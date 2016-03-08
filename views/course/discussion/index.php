<?php
/**
 * Created by PhpStorm.
 */

$this->title = 'Discussion';
$this->params['breadcrumbs'][] = ['label'=>'course','url'=>'/course/index'];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/discussion.js');
$this->registerJsFile('/js/jquery.pjax.js');
?>
<h2>Discussion</h2>
<div >
    <a href="<?php echo Yii::app()->createUrl('discussion/test');?>">article</a>
</div>
<div id="main">Ìæ»»µÄÄÚÈİ</div>
