<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/16
 * Time: 21:12
 */
use yii\helpers\Html;

$this->title = 'Wiki';
$this->params['breadcrumbs']= [
    ['label'=>'Index','url'=>'/course/wiki/index'],
    $this->title
];
?>
<body>
    <h1>Wiki</h1>
    <div class="title_class">
        <h2>Title</h2>
        <p><?php echo(''.$wiki->title.'') ?></p>
    </div>
    <div>
        <h2>Tag</h2>
        <p><?php echo(''.$wiki->title.'') ?></p>
    </div>
    <div>
        <h2>Detail</h2>
        <p><?php echo(''.$wiki->detail.'') ?></p>
    </div>

</body>