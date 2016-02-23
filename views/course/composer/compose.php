<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/7
 * Time: 20:20
 */
$this->title = 'Compose';
$this->params['breadcrumbs'] = [
    ['label'=>'course','url'=>'/course/index'],
    ['label'=>'composer','url'=>'/course/composer/index'],
    $this->title
];

?>

<div class="course-composer-compose">
    <?php
        $this->registerCssFile('/css/composer.css');
        $this->registerJsFile('/js/jquery-2.2.0.min.js');
        $this->registerJsFile('/js/jquery.animate-colors-min.js');
        $this->registerJsFile('/js/composer.js');
    ?>
    <div class="composer">
        <div class="composer-topbar">
            <span class="composition-fulltitle"> Title: <input type="text" maxlength="60" class="composition-title" contenteditable="true" value="DefaultTitle"></span>
            <div class="btn-group" role="group" style="float:right">
                <button type="button" class="btn btn-default op-note">Note</button>
                <?php if(\app\models\account\User::IsAppUserTeacher()): ?>
                <button type="button" class="btn btn-default op-comment">Comment</button>
                <button type="button" class="btn btn-default op-remark">Remark</button>
                <button type="button" class="btn btn-default op-score">Score</button>
                <?php endif ?>
            </div>
        </div>
        <div class="composer-textedit" contenteditable="true">
            <span class="composer-normal">Normal</span>
            <span class="composer-history" title="history"></span>
            <span class="composer-note" title="note"></span>
            <span class="composer-comment" title="comment"></span>
        </div>
        <div class="composer-bottombar">
            <button class="btn btn-primary btn-save">Save</button>
            <button class="btn btn-success btn-submit">Submit</button>
            <button class="btn btn-warning btn-reset">Reset</button>
            <button class="btn btn-danger btn-cancel">Cancel</button>
            <div class="btn-group" role="group" style="float:right">
                <button type="button" class="btn btn-primary switch" target="comment"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Comment</button>
                <button type="button" class="btn btn-primary switch" target="history"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> History</button>
                <button type="button" class="btn btn-primary switch" target="note"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Note</button>
            </div>
            <div class="btn-group" role="group" style="float:right">
                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-info" title="Date:">Date</button>
                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-info" title="Status:">Status</button>
                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-info" title="Score:">Score</button>
                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-info" title="Remark:">Remark</button>
            </div>
        </div>
    </div>
</div>