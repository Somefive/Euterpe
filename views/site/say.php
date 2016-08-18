<?php
    use yii\helpers\Html;
?>
<?= Html::encode($message) ?>
<?= Html::cssFile("@web/css/wiki/index.css")?>
<?= Html::jsFile("@web/js/course/wiki-card.js")?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(23)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(27)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(23)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(27)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(23)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(27)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(23)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(27)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(23)]);?>
<?= \app\components\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(27)]);?>
