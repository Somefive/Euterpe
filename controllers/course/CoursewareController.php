<?php
/**
 * Created by PhpStorm.
 */

namespace app\controllers\course;

use yii\web\Controller;
use Yii;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;
use yii\web\UploadedFile;
use app\models\course\courseware\UploadForm;

class CoursewareController extends Controller
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
        $coursewares = array(0,1,2,3,4,5);
        return $this->render('index',['coursewares' => $coursewares]);
    }

    public function actionUploadCourseware()
    {
    	//UploadForm::alert(phpinfo());
    	$model = new UploadForm();
		if (Yii::$app->request->isPost) {
			$model->title = Yii::$app->request->post()['UploadForm']['title'];
			Yii::warning(Yii::$app->request->post());
			Yii::warning($model->title);
			$model->coursewareFile = UploadedFile::getInstance($model, 'coursewareFile');
			if ($model->save()) {
				return $this->render('say',['message'=>'上传成功']);
			}
			else
				return $this->render('say',['message'=>'上传失败']);
		}

		return $this->render('uploadCourseware', ['model' => $model]);
    }

    public function actionCourseware()
    {
	    return $this->render("courseware");
    }
}