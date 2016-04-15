<?php

namespace app\controllers\course;

use yii\web\Controller;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\models\course\courseware\UploadForm;
use app\models\course\courseware\Courseware;

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
        $courseware = new Courseware();
        $coursewares = $courseware->getAllCoursewares();
        //Yii::warning($coursewares);
        return $this->render('index',['coursewares' => $coursewares]);
    }

    public function actionUploadCourseware()
    {
    	//UploadForm::alert(phpinfo());
    	$model = new UploadForm();
        //这里没有使用load
		if (Yii::$app->request->isPost) {
			$model->title = Yii::$app->request->post()['UploadForm']['title'];
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
        $fileID = $this->getQueryValue();
        //处理极端情况
        if($fileID == null) {
            return $this->render('say',['message' => "您访问的网址不正确"]);
        }
        $fileName = Yii::getAlias('@webroot')."/courseware/$fileID.pdf";
        if( !file_exists($fileName) )   {
            return $this->render('say',['message' => "您访问的文件不存在"]);
        }
	    return $this->render("courseware");
    }
    /**
     * [离开课件页面时调用函数，用来统计在线时间等]
     * @return null
     */
    public function actionExitCourseware()
    {

    }
    /**
     * 得到url中指定的参数值
     * @param  string $key [指定的参数]
     * @return [string,这里暂定为整数]      [指定参数的值]
     */
    private function getQueryValue($key = "fileID")
    {
        $query = $_SERVER["QUERY_STRING"];
        $reg = "|$key=(\d+)&?.*|";
        preg_match($reg, $query, $value);
        return $value[1];
    }
    private function alert($str="")
    {
        if(is_array($str))
            $str = "ARRAY:".implode(" ",$str);
        echo "<script type='text/javascript'>alert('$str');</script>";
    }
}