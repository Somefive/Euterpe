<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/4
 * Time: 11:37
 */

namespace app\controllers;

use app\models\account\User;
use app\models\course\Course;
use app\models\course\Courseenrollment;
use Yii;
use yii\web\controller;

class CourseController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

    }

    public function actionList()
    {
        $courses = Course::find()->all();
        $studentcourses = Course::getCourses(User::getAppUser()->id);
        $returncourse = [];
        foreach($courses as $course)
        {
            $course->enrolled = in_array($course,$studentcourses);
            array_push($returncourse,$course);
        }
        return $this->render('list',[
            'courses' => $returncourse,
        ]);
    }

    public function actionEnrollnewcourse()
    {
        $message = '';
        $courseenrollment = new Courseenrollment();
        $courseenrollment->courseid = Yii::$app->request->get('courseid');
        $courseenrollment->studentid = User::getAppUser()->id;
        if(Courseenrollment::findOne(['courseid'=>$courseenrollment->courseid,'studentid'=>$courseenrollment->studentid]))
            $message = 'You have already enrolled in this course. 您已经报名过该课程';
        elseif($courseenrollment->save())
            $message = 'Enroll successfully. 报名成功';
        else
            $message = 'Enroll failed. 报名失败';
        return $this->render('say',['message'=>$message]);
    }


    public function actionEntercourse()
    {
        $courseid = Yii::$app->request->get('courseid');
        $studentid = User::getAppUser()->id;
        if(!Courseenrollment::findOne(['courseid'=>$courseid,'studentid'=>$studentid]))
            return $this->render('say',['message'=>'Course not enrolled yet.']);
        else{
            setcookie("courseid",$courseid,time()+86400,'/');
            return $this->render('say',['message'=>'Enter success!']);//TODO
        }
    }

    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest)
            $this->redirect('/site/say?message='.urlencode('Please Login First 请先登录'));
        return parent::beforeAction($action);
    }
}