<?php

namespace app\models\course\courseware;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\account\User;

/**
 * 和数据表courseware进行交互
 */
class Courseware extends ActiveRecord
{
	public function getAllCoursewares()
	{	
		$coursewares = Courseware::find()->asArray()->all();
		return $coursewares;
	}

	public static function getCoursewareByID($id){
	    return Courseware::find()->where(['id'=>$id])->one();
    }
}
