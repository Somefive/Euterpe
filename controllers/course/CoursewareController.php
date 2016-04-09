<?php
/**
 * Created by PhpStorm.
 */

namespace app\controllers\course;

use yii\web\Controller;
use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use kartik\mpdf\Pdf;
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
    public function actionTest()
    {
	    $pdf = Yii::$app->pdf;
	    $pdf->content = "123";
	    return $pdf->render();
    }
}