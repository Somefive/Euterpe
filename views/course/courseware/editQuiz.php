<?php
/**
 * Created by PhpStorm.
 * User: kaidi
 * Date: 2016/4/19
 * Time: 22:26
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/js/jquery-3.1.0.min.js');
$this->registerJsFile('/js/course/courseware/editQuiz.js');
$this->registerCssFile('/css/courseware/editQuiz.css');
$this->registerCssFile('/css/bootstrap.min.css');
?>


<head>
    <style>

    </style>
</head>
<body style="background-image:url(/img/discussion/4.jpg); background-attachment:fixed">
<form>
    <?php foreach ($Quizs as $quiz) {
        echo('<div class="quiz_"><span class="order">'.$quiz['order'].'</span><textarea class="content"> '.substr($quiz['content'],2).'</textarea>'.
            '<p class="showText">'.$quiz['order'].'.'.substr($quiz['content'],2).'</p></div>'
        );
        if(array_key_exists('options',$quiz)){
            foreach ($quiz['options'] as $option=>$options){
                echo('<div class="quiz_" style="display: inline-block">&nbsp&nbsp&nbsp&nbsp <label class="option"> '.$option.'.</label> '.'<input type="text" class="content" value = "'.$options.'"/>
                <p class = "showText" style="display:inline-block">'.$option.'.'.$options.'</p>
                <br/></div>'
                );
            }
        }
        echo('<div class="quiz_"><span class="answer">Answer:</span> <input type="text" class="content" value=" '.$quiz['answer'].'"/>
            <span class="answer2">Answer:</span><p class="showText" style="display:inline-block">'.$quiz['answer'].'</p></div>
        </br><br/>');
    }?>

    <button type="submit" class="btn btn-primary">Save</button>
</form >

</body>
<?php
    /*foreach ($Quizs as $quiz){
        echo($quiz['content'].'</br>');
        if(array_key_exists('options',$quiz)){
            foreach ($quiz['options'] as $option=>$options){
                echo('&nbsp&nbsp&nbsp&nbsp'.$option.'. '.$options).'</br>';
            }
        }
        echo('Answer: '.$quiz['answer'].'</br>');
        echo('</br>');
    }*/
?>





