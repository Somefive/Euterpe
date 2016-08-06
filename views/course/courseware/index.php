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
<body>


<section class="cws-container" style="">
	<?php foreach ($coursewares as $courseware): ?>
	<a href="/course/courseware/courseware?fileID=<?=ArrayHelper::getValue($courseware,'id')?>" target="_blank">
	<article class="cw-article">
		<header>
			<h3 class="cw-title"><b><?=ArrayHelper::getValue($courseware,'id')?>.&nbsp;<?=ArrayHelper::getValue($courseware,'title')?></b></h3>
			<span class="cw-time"><?=ArrayHelper::getValue($courseware,'uploadTime')?></span>
		</header>
		<p class="cw-content">The future that we have been so nervous and curious about is bright in our hearts.</p>
	</article>
	</a>
	<?php endforeach; ?>
</section>
</body>