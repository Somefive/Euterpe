<?php
/**
 * Created by PhpStorm.
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Courseware';
$this->registerCssFile('/css/courseware/index.css');
$this->registerJsFile('/js/course/courseware/index.js');

?>
<header>
	<h1>COURSEWARE</h1>
</header>
<section class="cws-container" style="">
	<?php foreach ($coursewares as $courseware): ?>
	<a href="http://localhost:8080/course/courseware/courseware">
	<article class="cw-article">
		<header>
			<h3 class="cw-title"><b>1&nbsp;Examples of Courseware</b></h3>
			<span class="cw-time">May 1, 2016 by Tearcher</span>
		</header>
		<p class="cw-content">Today I design this view,I think it's good...</p>
	</article>
	</a>
	<?php endforeach; ?>
</section>