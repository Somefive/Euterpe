<?php
namespace app\models\course\courseware;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $coursewareFile;
    public $title;

    public function rules()
    {
        return [
            [['coursewareFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];
    }
    
    public function save()
    {
        if ($this->validate()) {
            $courseware = new Courseware();
            $courseware->title = $this->title;
            $courseware->save();
            $PDF = 'courseware/' . $courseware->id . '.' . $this->coursewareFile->extension;
            $this->coursewareFile->saveAs($PDF);
            return true;
        } else {
            return false;
        }
    }
    public static function alert($str="")
    {
        if(is_array($str))
            $str = "ARRAY:".implode(" ",$str);
        echo "<script type='text/javascript'>alert('$str');</script>";
    }
}