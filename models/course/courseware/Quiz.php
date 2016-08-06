<?php
/**
 * Created by PhpStorm.
 * User: kaidi
 * Date: 2016/4/23
 * Time: 12:31
 */

namespace app\models\course\courseware;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\account\User;
use yii\base\Model;
use yii\web\UploadedFile;


/**
 * 和不同类型的quiz数据进行交互
 */
class Quiz
{
    public function getAllQuizsById($id){

        $subquizs = Subjectivequiz::getQuizsById($id);
        $obquizs = Objectivequiz::getQuizsById($id);
        $quizs = array_merge($obquizs,$subquizs);
        for($i = 0;$i<count($quizs)-1;++$i){
            for($j = $i+1;$j<count($quizs);++$j){
                if($quizs[$i]['order']>$quizs[$j]['order']){
                    $temp = $quizs[$i];
                    $quizs[$i] = $quizs[$j];
                    $quizs[$j] = $temp;
                }
            }
        }
        /*for($i = 0;$i<count($quizs);++$i){
            if(!$quizs[$i]['options'])$quizs[$i]['type'] = "Subjective";
            else $quizs[$i]['type'] = "Objective";
        }*/
        return $quizs;
    }

    public static function deleteByID($id){
        Subjectivequiz::deleteByID($id);
        Objectivequiz::deleteByID($id);
    }

}


class Subjectivequiz extends ActiveRecord{
    public  function getQuizsById($id){
        $query = Subjectivequiz::find()->where(['quizId' => $id])->asArray()->all();
        return $query;
    }
    public static function deleteByID($quizID){
       Subjectivequiz::deleteAll('quizId=:id',array(':id'=>$quizID));
    }
}


class Objectivequiz extends ActiveRecord{
    public static function getQuizsById($id){
        $query = static::find()->where(['quizId' => $id])->asArray()->all();
        for($i = 0; $i<count($query);++$i){
            $options = $query[$i]['options'];
            $query[$i]['options'] = array();
            $length = strlen($options);
            //$pattern = "|[A-Z]+|";
            $string = "";
            for($x =0 ;$x < $length; ++$x){
                if($options[$x]!=';')$string .= $options[$x];
                else{
                    $index = 1;
                    while($string[$index] == '.'||$string[$index] == ' '){
                        ++$index;
                    }
                    $query[$i]['options'][$string[0]] = substr($string,$index);
                    $string = "";
                }
            }
        }
        return $query;
    }
    public static function deleteByID($quizID){
        Objectivequiz::deleteAll('quizId=:id',array(':id'=>$quizID));
    }
}