<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/3
 * Time: 21:08
 */
namespace app\models\course;

use yii\db\ActiveRecord;

class Course extends ActiveRecord
{
    public $enrolled;

    //返回该课程的所有学生ID[array of INT]
    public function getStudents()
    {
        $enrollments = Courseenrollment::findAll(['courseid'=>$this->id]);
        $students = [];
        foreach($enrollments as $enrollment)
            array_push($student,$enrollment->studentid);
        return $students;
    }

    //返回对应ID学生的所有课程[array of [Course object]]
    public static function getCourses($studentid)
    {
        $enrollments = Courseenrollment::findAll(['studentid'=>$studentid]);
        $courses = [];
        foreach($enrollments as $enrollment)
        {
            $course = Course::findOne($enrollment->courseid);
            array_push($courses,$course);
        }
        return $courses;
    }

}