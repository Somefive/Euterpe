<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/7
 * Time: 17:10
 */

namespace app\controllers\course;

use app\models\account\StudentBasicInformation;
use app\models\account\User;
use app\models\course\Composition;
use app\models\course\Courseenrollment;
use yii\web\Controller;
use Yii;

class ComposerController extends Controller
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
        $MyCompositions = Composition::find()->where(['studentid'=>User::getAppUserID(),'courseid'=>$_COOKIE['courseid']])->orderBy(['date'=>SORT_DESC])->all();
        $ModelEssays = COmposition::find()->where(['courseid'=>$_COOKIE['courseid'],'model'=>'True'])->orderBy(['date'=>SORT_DESC])->all();
        return $this->render('index.php',[
            'MyCompositions'=>$MyCompositions,
            'ModelEssays'=>$ModelEssays,
        ]);
    }

    public function actionCompose()
    {
        $compositionid = $_GET['id'];
        $composition = Composition::findOne(['id'=>$compositionid]);
        if(!$composition or ($composition->studentid!=User::getAppUserID() && !User::IsAppUserTeacher())) {
            $composition = new Composition();
            $composition->studentid = User::getAppUserID();
            $composition->courseid = $_COOKIE['courseid'];
            $composition->title = 'New Title';
            $composition->content = 'empty';
            $composition->status = 'Todo';
            $composition->date = date('y-m-d h:i:s', time());
            $composition->remark = 'none';
            $composition->score = 0;
            $composition->id = '';
        }
        setcookie('compositionid',$composition->id);
        return $this->render('compose.php',[
            'composition'=>$composition
        ]);
    }

    public function beforeAction($action)
    {
        $message = '';
        if(\Yii::$app->user->isGuest)
            $message = 'Please Login First 请先登录';
        else{
            $courseid = $_COOKIE['courseid'];
            $studentid = User::getAppUser()->id;
            if(!$courseid || !Courseenrollment::findOne(['courseid'=>$courseid,'studentid'=>$studentid]))
                $message = 'Please Enter Course First 请先进入课程';
        }
        if($message!='')
            $this->redirect('/site/say?message='.urlencode($message));
        return parent::beforeAction($action);
    }

    public function actionSaveComposition()
    {
        $compositionid = $_POST['compositionid'];
        $composition = Composition::findOne(['id'=>$compositionid]);
        if(!$composition)
            $composition = new Composition();

        $composition->studentid = $_POST['studentid'];
        $composition->courseid = $_POST['courseid'];
        $composition->title = $_POST['title'];
        $composition->content = $_POST['content'];
        $composition->status = $_POST['status'];
        $composition->score = $_POST['score'];
        $composition->remark = $_POST['remark'];
        $composition->date = date('y-m-d h:i:s',time());
        $date = $composition->date;

        $message = ['status'=>'Success','detail'=>''];

        if(!(User::IsAppUserTeacher() or User::getAppUserID()==$composition->studentid))
            $message['status'] = 'Forbidden';
        if(!$composition->validate())
            $message['status'] = 'Invalid Data';
        if(!$composition->save())
            $message['status'] = 'Operation Failed';
        $composition = Composition::findOne(['date'=>$date]);
        $message['detail'] = $composition->id;
        return json_encode($message);
    }

    public function actionGetComposition()
    {
        $compositionid = $_GET['id'];
        $composition = Composition::findOne(['id'=>$compositionid]);
        if(!$composition)
            return json_encode(['stutus'=>'fail','detail'=>'no such composition']);
        else {
            $writer = StudentBasicInformation::findOne(['id'=>$composition->studentid]);
            return json_encode(['status' => 'success', 'data' => [
                'title' => $composition->title,
                'writer' => $writer->enname.' / '.$writer->chname,
                'score' => $composition->score,
                'remark' => $composition->remark,
                'content' => $composition->content,
                'date' => $composition->date,
            ]]);
        }
    }
}