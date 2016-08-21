<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/7
 * Time: 20:04
 */
namespace app\models\course;

use yii\db\ActiveRecord;

/**
 * Class Composition
 * @package app\models\course
 * @property int id
 * @property string author_id
 * @property string course_id
 * @property string work_id
 * @property string title
 * @property string content
 * @property string created_at
 * @property string updated_at
 * @property string status
 * @property int score
 * @property string remark
 * @property string model
 */
class Composition extends ActiveRecord
{
    public function getBrief(){
        return [
            "id" => $this->id,
            "author_id" => $this->author_id,
            "course_id" => $this->course_id,
            "work_id" => $this->work_id,
            "title" => $this->title,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "status" => $this->status,
            "score" => $this->score,
            "model" => $this->model
        ];
    }

}