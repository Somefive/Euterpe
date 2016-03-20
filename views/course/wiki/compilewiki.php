<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/15
 * Time: 15:13
 */
use yii\helpers\html;

$this->title = CompileWiki;
$this->params['breadcrumbs']=[
    ['label'=>'Index','url'=>'/course/wiki/index'],
    $this->title
]
?>

<div>
    <h1>编辑wiki词条</h1>
    <form method="post" action="createsuccess">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <div class="input-group">
            <label class="input-group-addon" id="basic-addon1">Title</label>
            <input type="text" value="<?php echo $wiki->title ?>" name="title" id="title" class="form-control" placeholder="" aria-describedby="basic-addon1">
        </div>
        <br>
        <div class="input-group">
            <label class="input-group-addon" id="basic-addon1">Content</label>
            <input type="text" value="<?php echo $wiki->content?>" name="content" id="content" class="form-control" placeholder="" aria-describedby="basic-addon1">
        </div>
        <br>
        <div class="input-group">
            <label class="input-group-addon" id="basic-addon1">Detail</label>
            <input type="text" value="<?php echo $wiki->detail?>" name="detail" id="detail" class="form-control" placeholder="" aria-describedby="basic-addon1" >
        </div>
        <br>
        <input type="submit" class="btn-lg btn-danger" value="创建" />
        <input type="reset" class="btn-lg btn-primary" value="重置" />
    </form>
</div>