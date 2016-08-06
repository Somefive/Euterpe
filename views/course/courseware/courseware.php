<?php
/**
 * Created by PhpStorm.
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Courseware';

$this->registerJsFile('/js/course/courseware/pdfobject.js');
$this->registerJsFile('/js/course/courseware/courseware.js');
$this->registerCssFile('/css/courseware/courseware.css');
?>

<div class="upload-quiz">
    <button type="button " style="float:right"  ><a href="/course/courseware/upload-quiz?quizID=<?=$fileID?>" >Upload Quiz</a></button>
</div>
<div id="pdf">
    
</div>