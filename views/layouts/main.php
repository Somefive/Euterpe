<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
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
    <?php
    NavBar::begin([
        'brandLabel' => 'Euterpe',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $Nav_courseitem = [
        '<li class="dropdown-header">General</li>',
        ['label' => 'Courses List', 'url' => '/course/list'],
    ];
    //if($_COOKIE['courseid']){
	if(in_array("courseid",$_COOKIE)){
        $course = \app\models\course\Course::findOne(['id'=>$_COOKIE['courseid']]);
        if($course){
            array_push($Nav_courseitem,'<li class="divider"></li>');
            array_push($Nav_courseitem,'<li class="dropdown-header">'.$course->name.'</li>');
            array_push($Nav_courseitem,['label' => 'Class', 'url' => '/course/class']);
            array_push($Nav_courseitem,['label' => 'Composer', 'url' => '/course/composer/index']);
            array_push($Nav_courseitem,['label' => 'Discussion', 'url' => '/course/share/index']);
            array_push($Nav_courseitem,['label' => 'Wiki', 'url' => '/course/wiki']);
            array_push($Nav_courseitem,['label' => 'Share', 'url' => '/course/share/index']);
        }
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest ?
                ['label' => 'Home', 'url' => ['/site/index']] :
                [
                    'label' => 'Course',
                    'items' => $Nav_courseitem,
                ],

            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],

            Yii::$app->user->isGuest ?
                ['label' => 'Register', 'url' => ['/account/register']] :
                ['label'=> Yii::$app->user->identity->username, 'url' => ['/account/'] ],

            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/account/login']] :
                [
                    'label' => 'Logout',
                    'url' => ['/account/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],

            ['label' => 'Test', 'url' => ['/site/test']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Tsinghua University <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
