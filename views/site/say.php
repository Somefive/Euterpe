<?php
    use yii\helpers\Html;
?>
<?= Html::encode($message) ?>
<?= \app\components\wiki\WikiCard::widget(["wiki"=>\app\models\course\Wiki::getWikiById(29)]) ?>