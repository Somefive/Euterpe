<?php
namespace app\models\course\courseware;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\account\User;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\course\courseware\Courseware;

class UploadQuiz extends Model
{
    public $quizFile;
    public $name;
    public $id;
    public $date;
    public function rules()
    {
        return [
            [['quizFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt'],
        ];
    }
    //保存文件
    public function save()
    {
        if ($this->validate()) {
            $courseware = Courseware::getCoursewareByID($this->id);
            $courseware->quizFilename = $this->name;
            $courseware->quizUploadTime = date("F j,Y", time());
            $courseware->save();
            $this->date = $courseware->quizUploadTime;
            $txt = 'courseware/quiz/' .$this->date . $this->name;
            $this->quizFile->saveAs($txt);
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

    //8/5已修改
    public function analyze(){
        $quizfile = fopen(Yii::getAlias('@webroot')."/courseware/quiz/".$this->date.$this->name,'r') or die("Unable to open file!");
        while(!feof($quizfile)){
            $mess = fgets($quizfile);
            if(substr($mess, 0, 2)=="O:" and strlen($mess)==4){
                $obj = new Objectivequiz();
                $obj->quizId = $this->id;
                $str = fgets($quizfile);
                while(strlen($str)<7||substr($str,0,7) != "ANSWER:"){
                    $pattern1 = "/^[0-9]\. .*/";
                    $pattern2 = "/^[A-Z]\. .*/";
                    if(preg_match($pattern1,$str)){
                        $obj->order = $str[0];
                        $obj->content.=substr($str,0,strlen($str)-2);
                    }
                    else if(preg_match($pattern2,$str)){
                        $obj->options = $obj->options.substr($str,0,strlen($str)-2).";";
                    }
                    $str = fgets($quizfile);
                   // return $str;
                }
                $answer = fgets($quizfile);
                $pattern = "|[a-zA-Z]+|";
                preg_match($pattern,$answer,$matches);
                $obj->answer = $matches[0];
                $obj->save();
            }
            else if(substr($mess, 0, 2)=="S:" and strlen($mess)==4){
                //return "主观题";
                $sub = new Subjectivequiz();
                $sub->quizId = $this->id;
                //return $sub->quizId;
                $str = fgets($quizfile);
                $pattern1 = "/^[0-9]\. .*/";
                if(preg_match($pattern1,$str)){
                    $sub->order = $str[0];
                    $sub->content .= substr($str,0,strlen($str)-2);
                }
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