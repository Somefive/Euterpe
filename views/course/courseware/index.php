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
	<a href="http://localhost:8080/course/courseware/courseware#7">
	<article class="cw-article">
		<header>
			<h3 class="cw-title"><b><?=ArrayHelper::getValue($courseware,'id')?>.&nbsp;<?=ArrayHelper::getValue($courseware,'title')?></b></h3>
			<span class="cw-time"><?=ArrayHelper::getValue($courseware,'uploadTime')?></span>
		</header>
		<p class="cw-content">Today I design this view,I think it's good...</p>
	</article>
	</a>
	<?php endforeach; ?>
</section>