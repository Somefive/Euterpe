<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/7
 * Time: 17:18
 */
$this->title = 'Composer 作文区';
$this->params['breadcrumbs'][] = ['label'=>'course','url'=>'/course/index'];
$this->params['breadcrumbs'][] = $this->title;

function getTrClass($status){
    switch($status){
        case "Completed": return "success";
        case "Judged": return "info";
        case "Todo": return "danger";
        case "ToModify": return "warning";
        default: return "";
    }
}

$this->registerJsFile('/js/course/composer-index.js');
?>

<div class="course-composer">
    <div style="margin: 15px;">
        <button class="btn btn-default" onclick="window.location='/course/composer/compose'">New Composition 新作文</button>
    </div>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        My compositions 我的作文
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Status</td>
                                <td>Time</td>
                                <td>Score</td>
                            </tr>
                        </thead>
                        <?php foreach($MyCompositions as $composition):?>
                            <tr class="composer <?=getTrClass($composition->status);?>" compose-id="<?=$composition->id?>" style="cursor: pointer">
                                <td><?=$composition->id?></td>
                                <td><?=$composition->title?></td>
                                <td><?=$composition->status?></td>
                                <td><?=$composition->date?></td>
                                <td><?=$composition->score?></td>
                            </tr>
                        <?php endforeach?>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Good compositions 范文
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>Writer</td>
                            <td>Title</td>
                            <td>Score</td>
                            <td>Remark</td>
                        </tr>
                        </thead>
                        <?php foreach($ModelEssays as $essay):?>
                            <tr class="viewer" viewer-id="<?=$essay->id?>" style="cursor: pointer">
                                <td><?php
                                    $info = \app\models\account\StudentBasicInformation::findOne(['id'=>$essay->studentid]);
                                    echo $info->enname.' / '.$info->chname;
                                    ?></td>
                                <td><?=$essay->title?></td>
                                <td><?=$essay->score?></td>
                                <td><?=strlen($essay->remark)>50?substr($essay->remark,0,47).'...':$essay->remark?></td>
                            </tr>
                        <?php endforeach?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="Viewer" tabindex="-1" role="dialog" aria-labelledby="viewer-title">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="viewer-title"></h2>
                </div>
                <div class="modal-body">
                    <h3 style="text-align: center">via <span id="viewer-writer"></span></h3>
                    <h4 style="text-align: center"><span id="viewer-date"></span></h4>
                    <br/>
                    <h4>Remark: <span id="viewer-remark"></span></h4>
                    <h4>Score: <span id="viewer-score"></span></h4><br/>
                    <h4><span id="viewer-content"></span></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

