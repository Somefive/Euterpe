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
?>

<?php
    foreach ($Quizs as $quiz){
        echo($quiz['content'].'</br>');
        if($quiz['type']=='Objective'){
            foreach ($quiz['options'] as $option=>$options){
                echo('&nbsp&nbsp&nbsp&nbsp'.$option.'. '.$options).'</br>';
            }
        }
        echo('Answer: '.$quiz['answer'].'</br>');
        echo('</br>');
    }
?>


