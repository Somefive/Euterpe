<?php
/**
 * Created by PhpStorm.
 */

$this->title = 'Discussion';
$this->params['breadcrumbs'][] = ['label'=>'course','url'=>'/course/index'];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/course/discussion/discussion.js');
//$this->registerJsFile('/js/jquery.pjax.js');
?>
<h2>Discussion</h2>
<div id="main"><?php echo date('h:i:s') . "\n";sleep(2);echo date('h:i:s') . "\n";?></div>
