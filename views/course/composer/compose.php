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
        $this->registerJsFile('/js/jquery.cookie.js');
        $this->registerJsFile('/js/composer.js');
    ?>
    <div class="composer">
        <div class="composer-topbar">
            <span class="composition-fulltitle"> Title: <input type="text" id="composer-titlebox" maxlength="60" class="composition-title" contenteditable="true" value="<?=$composition->title?>"></span>
            <div class="btn-group" role="group" style="float:right">
                <?php if(\app\models\account\User::isTeacher()): ?>
                <button type="button" class="btn btn-default op op-note" op-type="note">Note</button>
                <button type="button" class="btn btn-default op op-comment" op-type="comment">Comment</button>
                <button type="button" class="btn btn-default">Remark</button>
                <button type="button" class="btn btn-default">Score</button>
                <?php endif ?>
            </div>
        </div>
        <div class="composer-textedit" contenteditable="plaintext-only">
            <?=$composition->content?>
        </div>
        <div class="composer-bottombar">
            <button class="btn btn-primary btn-save">Save</button>
            <button class="btn btn-success btn-submit">Submit</button>
            <button class="btn btn-warning btn-reset">Reset</button>
            <button class="btn btn-danger btn-clear">Clear</button>
            <div class="btn-group" role="group" style="float:right">
                <button type="button" class="btn btn-primary switch" target="comment"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Comment</button>
                <button type="button" class="btn btn-primary switch" target="history"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> History</button>
                <button type="button" class="btn btn-primary switch" target="note"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Note</button>
            </div>
            <div class="btn-group" role="group" style="float:right">
                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-info composition-info date" title="Date:" value="<?=$composition->date?>">Date</button>
                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-info composition-info status" title="Status:" value="<?=$composition->status?>">Status</button>
                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-info composition-info score" title="Score:" value="<?=$composition->score?>">Score</button>
                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-info composition-info remark" title="Remark:" value="<?=$composition->remark?>">Remark</button>
            </div>
        </div>
        <input type="hidden" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" id="YII_CSRF_TOKEN" />
        <input type="hidden" value="<?php echo \app\models\account\User::getAppUserID() ?>" name="UserID" id="UserID" />
    </div>
</div>