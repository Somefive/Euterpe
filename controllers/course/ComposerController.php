<?php
/**
 * Created by PhpStorm.
 * User: Somefive
 * Date: 2016/2/7
 * Time: 17:10
 */

namespace app\controllers\course;

use app\models\account\BasicInformation;
use app\models\account\User;
use app\models\course\Composition;
use app\models\course\Courseenrollment;
use Faker\Provider\zh_TW\DateTime;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;

class ComposerController extends Controller
{
    public $layout = "euterpe";

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
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

    public function actionUpsertComposition(){
        $id = $_POST["id"];
        $composition = Composition::findOne($id);
        if($composition){
            $composition = new Composition();
            $composition->created_at = date("Y-m-d H:i:s");
        }
        else if($composition->id != Yii::$app->user->id)
            return json_encode(['status' => false, 'data' => "user invalid"]);
        /* @var Composition $composition*/
        $composition->author_id = Yii::$app->user->id;
        $composition->course_id = $_POST["course_id"];
        $composition->work_id = $_POST["work_id"];
        $composition->title = $_POST["title"];
        $composition->content = $_POST["content"];
        $composition->updated_at = date("Y-m-d H:i:s");
        $composition->status = $_POST["status"];
        if(Yii::$app->user->can("teacher")){
            $composition->score = $_POST["score"];
            $composition->remark = $_POST["remark"];
            $composition->model = $_POST["model"];
        }
        if($composition->save()) return json_encode(['status' => true, 'message' => 'success']);
        else return json_encode(['status' => false, 'message' => 'db error']);
    }

    public function actionGetComposition($id){
        $composition = Composition::findOne($id);
        /* @var Composition $composition */
        if($composition) return json_encode(['status' => true, 'data' => $composition->oldAttributes]);
        else return json_encode(['status' => false, 'message' => 'composition not found']);
    }

    public function actionGetMyCompositions($full = false){
        $composition_records = Composition::findAll(['author_id'=>Yii::$app->user->id]);
        $compositions = [];
        foreach($composition_records as $record){
            if($full) array_push($compositions,$record->oldAttributes);
            else array_push($compositions,$record->getBrief());
        }
        return json_encode(['status' => true, 'data' => $compositions]);
    }

    public function actionGetModelCompositions($course_id, $work_id){
        $composition_records = Composition::findAll(['course_id'=>$course_id, 'work_id'=>$work_id, 'model'=>'True']);
        $compositions = [];
        foreach($composition_records as $record){
            array_push($compositions,$record->getBrief());
        }
        return json_encode(['status' => true, 'data' => $compositions]);
    }

    public function actionGetCourseCompositions($course_id){
        $composition_records = Composition::findAll(['course_id'=>$course_id]);
        $compositions = [];
        foreach($composition_records as $record){
            array_push($compositions,$record->getBrief());
        }
        return json_encode(['status' => true, 'data' => $compositions]);
    }
}