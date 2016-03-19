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
        if($remindedManId==User::getAppUserID())return;
        $reminded = Remind::findOne($remindedManId);//->where(['userId' => $remindedManId])->asArray()->all();
        $x=0;
        for(;$x<count($reminded->reminded);$x++){
            if($reminded->reminded[$x]==';'and $reminded->reminded[$x+1]==$remindedPostId)break;
        }
        //之前不存在帖子
        if($x=count($reminded->reminded)-1){$reminded->reminded=$reminded->reminded.';'.$remindedPostId.':['.$remindManId.':'.$remindPotsId.']';}
        //之前存在该帖子
        else{
            for($i=$x+1;$i<count($reminded->reminded);$i++)
                if($reminded->reminded[$i]==']'){
                    $sub1=substr($reminded->reminded,0,$i-1);
                    $sub2=substr($reminded->reminded,$i+1);
                    $reminded->reminded=$sub1.','.$remindManId.':'.$remindPotsId.']'.$sub2;
                    break;
                }
        }
        $reminded->save();
    }
    public static function addReplyedOfA($replyedManId,$replyedPostId,$replyManId,$replyPostId){
        $replyed = Remind::findOne($replyedManId);
        return $replyed->replyedOfA;
        $x=0;
        for(;$x<count($replyed->replyedOfA);$x++){
            if($replyed->replyedOfA[$x]==';'and $replyed->replyedOfA[$x+1]==$remindedPostId)break;
        }
        //之前不存在帖子
        if($x=count($replyed->replyedOfA)-1){$replyed->replyedOfA=$replyed->replyedOfA.';'.$replyedPostId.':['.$replyManId.':'.$remindPotsId.']';}
        //之前存在该帖子
        else{
            for($i=$x+1;$i<count($replyed->replyedOfA);$i++)
                if($replyed->replyedOfA[$i]==']'){
                    $sub1=substr($replyed->replyedOfA,0,$i-1);
                    $sub2=substr($replyed->replyedOfA,$i+1);
                    $replyed->replyedOfA=$sub1.','.$remindManId.':'.$remindPotsId.']'.$sub2;
                    break;
                }
        }
        $replyed->save();


    }
    
}