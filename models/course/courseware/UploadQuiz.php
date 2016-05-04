<?php
namespace app\models\course\courseware;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\account\User;
use yii\base\Model;
use yii\web\UploadedFile;


class UploadQuiz extends Model
{
    public $quizFile;
    public $name;
    public $id;
    public function rules()
    {
        return [
            [['quizFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt'],
        ];
    }
    
    public function save()
    {
        if ($this->validate()) {
            $quiz = new Quiz();
            $quiz->name = $_FILES["UploadQuiz"]["name"]["quizFile"];
            $quiz->uploadtime = date("F j,Y", time());
            $txt = 'courseware/quiz/' . $quiz->name;
            $this->quizFile->saveAs($txt);
            $quiz->save();
            $this->id = $quiz->id;
            return true;
        } else {
            return false;
        }
    }
    //解析提交的题目文件
    /*
     * 题目文件的格式为
     * 客观题：
        O:
        题目内容
        ANSWER:
        主观题：
         S:
        题目内容

        sample:
        O:
        1. Who is the best singer?
        A. Jay Chou
        B. Taylor Swift
        C. Jhon Lengend
        D. Morron 5

        ANSWER:
        CD

        S:
        2. Decribe the future you imagine.

        ANSWER:

        O:
        3. Which are the right methods ?
        A. AAA
        B. BBB
        C. CCC
        D. DDD

        ANSWER:
        B
     * */
    public function analyze(){
        $quizfile = fopen(Yii::getAlias('@webroot')."/courseware/quiz/".$this->name,'r') or die("Unable to open file!");
        //$mess = fread($quizfile, filesize($_FILES["UploadQuiz"]["tmp_name"]["quizFile"]));
        while(!feof($quizfile)){
            $mess = fgets($quizfile);
           // return $this->id;
            if(substr($mess, 0, 2)=="O:"){
                $obj = new Objectivequiz();
                $obj->id = $this->id;
                $obj->order = substr($mess,2,strlen($mess)-4);
                $str = fgets($quizfile);
                while(strlen($str)<7||substr($str,0,7) != "ANSWER:"){
                    if($str[1]=="."&&($str[0]=="A"||$str[0]=="B"||$str[0]=="C"||$str[0]=="D")){
                        $obj->options = $obj->options.substr($str,0,strlen($str)-2).";";
                    }
                    else $obj->content.=substr($str,0,strlen($str)-2);
                    $str = fgets($quizfile);
                   // return $str;
                }
                $answer = fgets($quizfile);
                $pattern = "|[a-zA-Z]+|";
                preg_match($pattern,$answer,$matches);
                $obj->answer = $matches[0];
                $obj->save();
            }
            if(substr($mess, 0, 2)=="S:"){
                //return "主观题";
                $sub = new Subjectivequiz();
                $sub->id = $this->id;
                $sub->order = substr($mess,2,strlen($mess)-4);
                $str = fgets($quizfile);
                while(strlen($str)<7||substr($str,0,7) != "ANSWER:"){
                    $sub->content .= substr($str,0,strlen($str)-2);
                    $str = fgets($quizfile);
                }
                $sub->save();
            }
        }
        return $this->id;
    }

    public static function getQuiz($id){
        $Quiz = new Quiz();
        $allquiz = $Quiz->getAllQuizsById($id);
        return $allquiz;
    }


    public function alert($str="")
    {
        if(is_array($str))
            $str = "ARRAY:".implode(" ",$str);
        echo "<script type='text/javascript'>alert('$str');</script>";
    }
}