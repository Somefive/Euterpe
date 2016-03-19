<?php
/**
 * Created by PhpStorm.
 * User: kaidi
 * Date: 2016/3/19
 * Time: 12:03
 */

namespace app\models\course;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\account\User;

/*对数据库的表remind进行操作，增加提醒数据：
    1. 对A帖，B帖的回复进行提醒，
    2. 对@功能提供接口
    3. 删除操作
*/

class Remind extends ActiveRecord
{
    public static function addRemindedData($remindedManId,$remindedPostId,$remindManId,$remindPotsId)
    {
        $reminded = Remind::findOne($remindedManId);//->where(['userId' => $remindedManId])->asArray()->all();
        $x=0;
        for(;$x<count($reminded->reminded);$x++){
            if($reminded->reminded[$x]==':'and $reminded->reminded[$x-1]==$remindedPostId)break;
        }
        for($i=$x;count($reminded->reminded);$i++)
            if($reminded->reminded[$i]==']'){

                $sub1=substr($reminded->reminded,0,$i-1);

                $sub2=substr($reminded->reminded,$i+1);

                $reminded->reminded=$sub1.','.$remindManId.':'.$remindPotsId.']'.$sub2;

                break;
            }
        $reminded->save();
    }
    
}