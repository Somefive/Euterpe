<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/15
 * Time: 15:12
 */
use yii\helpers\html;

$this->title = 'CreateWiki';
$this->params['breadcrumbs']= [
    ['label'=>'Index','url'=>'/course/wiki/index'],
    $this->title
];
?>
<div>
    <h1>创建wiki词条</h1>
    <form method="post" action="createsuccess">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <div class="input-group">
            <label class="input-group-addon" id="basic-addon1">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="basic-addon1">
        </div>
        <br>
        <div class="input-group">
            <label class="input-group-addon" id="basic-addon1">Tag</label>
            <input type="text" name="tag" id="tag" class="form-control" placeholder="" aria-describedby="basic-addon1">
        </div>
        <br>
        <div class="input-group">
            <label class="input-group-addon" id="basic-addon1">Detail</label>
            <input type="text" name="detail" id="detail" class="form-control" placeholder="" aria-describedby="basic-addon1" >
        </div>
        <br>
        <input type="submit" class="btn-lg btn-danger" value="创建" />
        <input type="reset" class="btn-lg btn-primary" value="重置" />
    </form>
</div>