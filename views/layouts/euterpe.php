<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\app\assets\EuterpeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?=\app\components\Navbar::widget()?>

    <?php if(!Yii::$app->user->isGuest): ?>
        <?=\app\components\SideBar::widget()?>
    <?php endif?>

    <div class="main-content">
        <?=$content?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
