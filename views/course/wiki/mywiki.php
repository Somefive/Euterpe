<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/15
 * Time: 15:13
 */
use yii\helpers\Html;

$this->title = 'MyWiki';
$this->params['breadcrumbs']= [
    ['label'=>'Index','url'=>'/course/wiki/index'],
    $this->title
];
?>
<div class="Wiki_mine">
    <h1><?=Html::encode($this->title)?></h1>
    <table class="table table-striped table-bordered" style="text-align: center;">
        <thead>
        <tr><td style="width: 200px;">Title</td><td>Content</td><td colspan="2">Operator</td></tr>
        </thead>
        <tbody>
        <?php
        foreach($mywikis as $wiki)
        {
            echo('
                  <tr>
                     <td>'.$wiki->title.'</td>
                     <td style="width:700px">'.$wiki->detail.'</td>
                     <td>
                        <form action="compilewiki" method="post">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <input type="hidden" name="wikiid" value='.$wiki->id.'>
                        <input type="submit" value="编辑" class="btn btn-danger" onclick="window.location=\'/course/wiki/compilewiki\'">
                        </form>
                        </td><td>
                        <form action="deletewiki" method="post">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <input type="hidden" name="wikiid" value='.$wiki->id.'>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        删除
                        </button>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Mywiki</h4>
                                      </div>
                                      <div class="modal-body">
                                      是否要删除?(Are you sure?)
                                      </div>
                                      <div class="modal-footer">
                                        <input type="submit" class="btn btn-danger" value="Yes" />
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        </form>
                        </td>
                     </tr>
                 ');
        }
        ?>
        </tbody>
    </table>
</div>