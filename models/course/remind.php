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
    public static function addRemindedData($remindedManId,$remindedPostId,$remindManId,$remindPostId){
        //if($remindedManId==User::getAppUserID())return;
        $reminded = Remind::findOne($remindedManId);
        $x=0;
        for(;$x<strlen($reminded->reminded);$x++){
            if($reminded->reminded[$x]==';'){
                $num="";
                for($y=$x+1;$y<strlen($reminded->reminded);$y++){
                    if($reminded->reminded!=':')$num.=$reminded->reminded[$y];
                    else break;
                }
                if($num==$remindedPostId)break;
            }
        }
        //之前不存在帖子
        if($x==strlen($reminded->reminded)){$reminded->reminded=$reminded->reminded.';'.$remindedPostId.':['.$remindManId.':'.$remindPostId.']';}
        //之前存在该帖子
        else{
            for($i=$x;$i<strlen($reminded->reminded);$i++)
                if($reminded->reminded[$i]==']'){
                    $sub1=substr($reminded->reminded,0,$i);
                    $sub2=substr($reminded->reminded,$i+1);
                    $reminded->reminded=$sub1.','.$remindManId.':'.$remindPostId.']'.$sub2;
                    break;
                }
        }
        $reminded->save();
        return $reminded->reminded;
    }
    public static function addReplyedOfA($replyedManId,$replyedPostId,$replyManId,$replyPostId){
        $replyed = Remind::findOne($replyedManId);
        $x=0;
        for(;$x<strlen($replyed->replyedOfA);$x++){
            if($replyed->replyedOfA[$x]==';'){
                $num="";
                for($y=$x+1;$y<strlen($replyed->replyedOfA);$y++){
                    if($replyed->replyedOfA[$y]!=':')$num.=$replyed->replyedOfA[$y];
                    else break;
                }
                if($num==$replyedPostId)break;
            }
        }
        //之前不存在帖子
        if($x==strlen($replyed->replyedOfA)){$replyed->replyedOfA=$replyed->replyedOfA.';'.$replyedPostId.':['.$replyManId.':'.$replyPostId.']';}
        //之前存在该帖子
        else{
            for($i=$x;$i<strlen($replyed->replyedOfA);$i++)
                if($replyed->replyedOfA[$i]==']'){
                    $sub1=substr($replyed->replyedOfA,0,$i);
                    $sub2=substr($replyed->replyedOfA,$i+1);
                    $replyed->replyedOfA=$sub1.','.$replyManId.':'.$replyPostId.']'.$sub2;
                    break;
                }
        }
        $replyed->save();
        return $replyed->replyedOfA;
    }

    public static function addReplyedOfB($replyedManId,$replyedPostId,$replyManId,$replyPostId){
        $replyed = Remind::findOne($replyedManId);
        $x=0;
        for(;$x<strlen($replyed->replyedOfB);$x++){
            if($replyed->replyedOfB[$x]==';'){
                $num="";
                for($y=$x+1;$y<strlen($replyed->replyedOfB);$y++){
                    if($replyed->replyedOfB[$y]!=':')$num.=$replyed->replyedOfB[$y];
                    else break;
                }
                if($num==$replyedPostId)break;
            }
        }
        //之前不存在帖子
        if($x==strlen($replyed->replyedOfB)){$replyed->replyedOfB=$replyed->replyedOfB.';'.$replyedPostId.':['.$replyManId.':'.$replyPostId.']';}
        //之前存在该帖子
        else{
            for($i=$x;$i<strlen($replyed->replyedOfB);$i++)
                if($replyed->replyedOfB[$i]==']'){
                    $sub1=substr($replyed->replyedOfB,0,$i);
                    $sub2=substr($replyed->replyedOfB,$i+1);
                    $replyed->replyedOfB=$sub1.','.$replyManId.':'.$replyPostId.']'.$sub2;
                    break;
                }
        }
        $replyed->save();
        return $replyed->replyedOfB;
    }

    public static function getRemindedData($remindedManId){
        $reminded = Remind::findOne($remindedManId);
        $str=explode(';',$reminded->reminded);
        $array=array();
        for($x=1;$x<count($str);$x++){
            $key='';
            $y=0;
            for(;$y<strlen($str[$x]);$y++){
                if($str[$x][$y]!=':')$key.=$str[$x][$y];
                else break;
            }
            $y+=2;
            $str1="";
            $exist=0;
            for(;$y<strlen($str[$x])-1;$y++){
                $str1.=$str[$x][$y];
                if($str[$x][$y]==',')$exist=1;
            }
            $array_=array();
            if($exist==1)$array0=explode(',',$str1);
            else{
                $array0=array($str1);
            }
            for($z=0;$z<count($array0);$z++){
                $temp=explode(':',$array0[$z]);
                $array_[$temp[0]]=$temp[1];
            }
            $array[$key]=$array_;
        }
        return $array;
    }

    public static function getReplyedAData($replyedmanId){
        $replyed = Remind::findOne($replyedmanId);
        $str=explode(';',$replyed->replyedOfA);
        $array=array();
        for($x=1;$x<count($str);$x++){
            $key='';
            $y=0;
            for(;$y<strlen($str[$x]);$y++){
                if($str[$x][$y]!=':')$key.=$str[$x][$y];
                else break;
            }
            $y+=2;
            $str1="";
            $exist=0;
            for(;$y<strlen($str[$x])-1;$y++){
                $str1.=$str[$x][$y];
                if($str[$x][$y]==',')$exist=1;
            }
            $array_=array();
            if($exist==1)$array0=explode(',',$str1);
            else{
                $array0=array($str1);
            }
            for($z=0;$z<count($array0);$z++){
                $temp=explode(':',$array0[$z]);
                $array_[$temp[0]]=$temp[1];
            }
            $array[$key]=$array_;
        }
        return $array;
    }

    public static function getReplyedBData($replyedmanId){
        $replyed = Remind::findOne($replyedmanId);
        $str=explode(';',$replyed->replyedOfB);
        $array=array();
        for($x=1;$x<count($str);$x++){
            $key='';
            $y=0;
            for(;$y<strlen($str[$x]);$y++){
                if($str[$x][$y]!=':')$key.=$str[$x][$y];
                else break;
            }
            $y+=2;
            $str1="";
            $exist=0;
            for(;$y<strlen($str[$x])-1;$y++){
                $str1.=$str[$x][$y];
                if($str[$x][$y]==',')$exist=1;
            }
            $array_=array();
            if($exist==1)$array0=explode(',',$str1);
            else{
                $array0=array($str1);
            }
            for($z=0;$z<count($array0);$z++){
                $temp=explode(':',$array0[$z]);
                $array_[$temp[0]]=$temp[1];
            }
            $array[$key]=$array_;
        }
        return $array;
    }

    public static function deleteRemindedData($remindedManId,$remindPostId){
        $reminded = Remind::findOne($remindedManId);
        for($x=0;$x<strlen($reminded->reminded);$x++){
            //找到两数字之间的分号
            if($reminded->reminded[$x]==':'&&$reminded->reminded[$x+1]!='['){
                $num='';//记录冒号后的数值
                for($y=$x+1;$y<strlen($reminded->reminded);$y++){
                    //如果先找到逗号
                    if($reminded->reminded[$y]==','){

                        if($num==$remindPostId){//如果数字相等
                            //取出逗号后面开始后半段字符串
                            $sub_b=substr($reminded->reminded,$y+1);
                            for($z=$x;$z>=0;$z--){//从分号往前找
                                if($reminded->reminded[$z]=='['|| $reminded->reminded[$z]==','){
                                    //保留【或者，
                                    $sub_a=substr($reminded->reminded,0,$z+1);
                                    $reminded->reminded=$sub_a.$sub_b;
                                    $reminded->save();
                                    return $reminded->reminded;
                                }
                            }
                        }
                        else break;
                    }
                    else if($reminded->reminded[$y]==']'){
                        if($num==$remindPostId){
                            //sub_b为【后面的字符串
                            if($y==strlen($reminded->reminded)-1)$sub_b='';
                            else $sub_b=substr($reminded->reminded,$y+1);
                            $z=$x;
                            //return $x;
                            //return $reminded->reminded;
                            for(;$z>=0;$z--){
                                if($reminded->reminded[$z]==','){
                                    //return $reminded->reminded;
                                    $sub_a=substr($reminded->reminded,0,$z);
                                    $reminded->reminded=$sub_a.']'.$sub_b;
                                    $reminded->save();
                                    return $reminded->reminded;
                                }
                                else if($reminded->reminded[$z]=='['){
                                    for($in=$z-1;$in>=0;$in--){
                                        if($reminded->reminded[$z]==';')
                                        {
                                            $sub_a=substr($reminded->reminded,0,$in);
                                            $reminded->reminded=$sub_a.$sub_b;
                                            $reminded->save();
                                           // return $reminded->reminded;
                                        };
                                    }
                                }
                                //else break;
                            }
                        }
                        else break;
                    }
                    $num.=$reminded->reminded[$y];
                }
            }
        }

    }

    public static function deleteReplyedData($replyedManId,$replyPostId){

    }
}