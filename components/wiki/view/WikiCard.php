<?php

use app\models\course\Wiki;

/* @var Wiki $wiki  */

$tags = str_replace(" ","",$tags);
$tags = preg_split('/\s*;\s*/',(string)$wiki->tag);

?>

<div class="wiki-card-wrapper">
    <div class="wiki-card panel panel-success" wikiid="<?=$wiki->id?>">
        <div class="panel-heading">
            <span class="panel-title"><?=$wiki->title?></span>
            <span class="editbar glyphicon glyphicon-resize-full foldbtn" aria-hidden="true" folded="true" data-toggle="tooltip" data-placement="top" title="Resize"></span>
            <?php if($wiki->studentid==\app\models\account\User::getAppUserID()): ?>
                <span class="editbar glyphicon glyphicon-pencil editbtn" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></span>
                <span class="editbar glyphicon glyphicon-trash deletebtn" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete"></span>
            <?php endif?>
            <span class="editbar glyphicon glyphicon-heart favorbtn" aria-hidden="true"><?=$wiki->favor?></span>
        </div>
        <div class="panel-body wiki-detail"><?=$wiki->detail?></div>
        <div class="panel-footer wiki-tag">
            <?php foreach($tags as $tag): ?>
                <span class='tag label label-info'><?=$tag?></span>
            <?php endforeach?>
        </div>
        <input type="hidden" class="panel-tag" value="<?=$wiki->tag?>">
    </div>
</div>