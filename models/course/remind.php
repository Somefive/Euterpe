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
        //return ($reminded==null);
        if($reminded==null){
            $reminded=new remind();
           // return $reminded->userId;
            $reminded->userId=$remindedManId;
            $reminded->username=User::getUsernameById($remindedManId);
            $reminded->reminded=$reminded->reminded.';'.$remindedPostId.':['.$remindManId.':'.$remindPostId.']';
        }
        else $reminded->reminded=Remind::addData($remindedPostId,$remindManId,$remindPostId,$reminded->reminded);
        $reminded->save();
        return $reminded->reminded;
    }
    public static function addReplyedOfA($replyedManId,$replyedPostId,$replyManId,$replyPostId){
        $replyed = Remind::findOne($replyedManId);
        if($replyed==null){
            $replyed= new remind();
            $replyed->userId=$replyedManId;
            $replyed->username=User::getUsernameById($replyedManId);
            $replyed->replyedOfA=$replyed->replyedOfA.';'.$replyedPostId.':['.$replyManId.':'.$replyPostId.']';
        }
        else $replyed->replyedOfA=Remind::addData($replyedPostId,$replyManId,$replyPostId,$replyed->replyedOfA);
        $replyed->save();
        return $replyed->replyedOfA;
    }
    public static function addReplyedOfB($replyedManId,$replyedPostId,$replyManId,$replyPostId){
        $replyed = Remind::findOne($replyedManId);
        if($replyed==null){
            $replyed= new remind();
            $replyed->userId=$replyedManId;
            $replyed->username=User::getUsernameById($replyedManId);
            $replyed->replyedOfB=$replyed->replyedOfB.';'.$replyedPostId.':['.$replyManId.':'.$replyPostId.']';
        }
        else  $replyed->replyedOfB=Remind::addData($replyedPostId,$replyManId,$replyPostId,$replyed->replyedOfB);
        $replyed->save();
        return $replyed->replyedOfB;
    }

    public static function getRemindedData($remindedManId){
        $reminded = Remind::findOne($remindedManId);
        $array=Remind::getData($reminded->reminded);
        return $array;
    }
  
    public static function getReplyedAData($replyedmanId){
        $replyed = Remind::findOne($replyedmanId);
        $array=Remind::getData($replyed->replyedOfA);
        return $array;
    }

    public static function getReplyedBData($replyedmanId){
        $replyed = Remind::findOne($replyedmanId);
        $array=Remind::getData($replyed->replyedOfB);
        return $array;
    }

    public static function getReplyedData($replyedmanId){
        return array_merge(Remind::getReplyedAData($replyedmanId),Remind::getReplyedBData($replyedmanId));
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
                                        if($reminded->reminded[$in]==';')
                                        {

                                            $sub_a=substr($reminded->reminded,0,$in);
                                            $reminded->reminded=$sub_a.$sub_b;
                                            $reminded->save();
                                            return $reminded->reminded;
                                        };
                                    }
                                }
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
            Remind::deleteAData($replyedManId,$replyPostId);
            Remind::deleteBData($replyedManId,$replyPostId);
    }

    public static function addData($edPostId,$ManId,$PostId,$data){
        $x=0;
        for(;$x<strlen($data);$x++){
            if($data[$x]==';'){
                $num="";
                for($y=$x+1;$y<strlen($data);$y++){
                    if($data!=':')$num.=$data[$y];
                    else break;
                }
                if($num==$edPostId)break;
            }
        }
        //之前不存在帖子
        if($x==strlen($data)){$data=$data.';'.$edPostId.':['.$ManId.':'.$PostId.']';}
        //之前存在该帖子
        else{
            for($i=$x;$i<strlen($data);$i++)
                if($data[$i]==']'){
                    $sub1=substr($data,0,$i);
                    $sub2=substr($data,$i+1);
                    $data=$sub1.','.$ManId.':'.$PostId.']'.$sub2;
                    break;
                }
        }
        return $data;
    }

    public static function getData($data){
        $str=explode(';',$data);
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

    public static function deleteAData($replyedManId,$replyPostId){
        $replyed = Remind::findOne($replyedManId);
        for($x=0;$x<strlen($replyed->replyedOfA);$x++){
            //找到两数字之间的分号
            if($replyed->replyedOfA[$x]==':'&&$replyed->replyedOfA[$x+1]!='['){
                $num='';//记录冒号后的数值
                for($y=$x+1;$y<strlen($replyed->replyedOfA);$y++){
                    //如果先找到逗号
                    if($replyed->replyedOfA[$y]==','){
                        if($num==$replyPostId){//如果数字相等
                            //取出逗号后面开始后半段字符串
                            $sub_b=substr($replyed->replyedOfA,$y+1);
                            for($z=$x;$z>=0;$z--){//从分号往前找
                                if($replyed->replyedOfA[$z]=='['|| $replyed->replyedOfA[$z]==','){
                                    //保留【或者，
                                    $sub_a=substr($replyed->replyedOfA,0,$z+1);
                                    $replyed->replyedOfA=$sub_a.$sub_b;
                                    $replyed->save();
                                    return $replyed->replyedOfA;
                                }
                            }
                        }
                        else break;
                    }
                    else if($replyed->replyedOfA[$y]==']'){
                        if($num==$replyPostId){
                            //sub_b为【后面的字符串
                            if($y==strlen($replyed->replyedOfA)-1)$sub_b='';
                            else $sub_b=substr($replyed->replyedOfA,$y+1);
                            $z=$x;
                            //return $x;
                            //return $reminded->reminded;
                            for(;$z>=0;$z--){
                                if($replyed->replyedOfA[$z]==','){
                                    //return $reminded->reminded;
                                    $sub_a=substr($replyed->replyedOfA,0,$z);
                                    $replyed->replyedOfA=$sub_a.']'.$sub_b;
                                    $replyed->save();
                                    return $replyed->replyedOfA;
                                }
                                else if($replyed->replyedOfA[$z]=='['){
                                    for($in=$z-1;$in>=0;$in--){
                                        if($replyed->replyedOfA[$in]==';')
                                        {

                                            $sub_a=substr($replyed->replyedOfA,0,$in);
                                            $replyed->replyedOfA=$sub_a.$sub_b;
                                            $replyed->save();
                                            return $replyed->replyedOfA;
                                        };
                                    }
                                }
                            }
                        }
                        else break;
                    }
                    $num.=$replyed->replyedOfA[$y];
                }
            }
        }
    }

    public static function deleteBData($replyedManId,$replyPostId){
        $replyed = Remind::findOne($replyedManId);
        for($x=0;$x<strlen($replyed->replyedOfB);$x++){
            //找到两数字之间的分号
            if($replyed->replyedOfB[$x]==':'&&$replyed->replyedOfB[$x+1]!='['){
                $num='';//记录冒号后的数值
                for($y=$x+1;$y<strlen($replyed->replyedOfB);$y++){
                    //如果先找到逗号
                    if($replyed->replyedOfB[$y]==','){
                        if($num==$replyPostId){//如果数字相等
                            //取出逗号后面开始后半段字符串
                            $sub_b=substr($replyed->replyedOfB,$y+1);
                            for($z=$x;$z>=0;$z--){//从分号往前找
                                if($replyed->replyedOfB[$z]=='['|| $replyed->replyedOfB[$z]==','){
                                    //保留【或者，
                                    $sub_a=substr($replyed->replyedOfB,0,$z+1);
                                    $replyed->replyedOfB=$sub_a.$sub_b;
                                    $replyed->save();
                                    return $replyed->replyedOfB;
                                }
                            }
                        }
                        else break;
                    }
                    else if($replyed->replyedOfB[$y]==']'){
                        if($num==$replyPostId){
                            //sub_b为【后面的字符串
                            if($y==strlen($replyed->replyedOfB)-1)$sub_b='';
                            else $sub_b=substr($replyed->replyedOfB,$y+1);
                            $z=$x;
                            //return $x;
                            //return $reminded->reminded;
                            for(;$z>=0;$z--){
                                if($replyed->replyedOfB[$z]==','){
                                    //return $reminded->reminded;
                                    $sub_a=substr($replyed->replyedOfB,0,$z);
                                    $replyed->replyedOfB=$sub_a.']'.$sub_b;
                                    $replyed->save();
                                    return $replyed->replyedOfB;
                                }
                                else if($replyed->replyedOfB[$z]=='['){
                                    for($in=$z-1;$in>=0;$in--){
                                        if($replyed->replyedOfB[$in]==';')
                                        {

                                            $sub_a=substr($replyed->replyedOfB,0,$in);
                                            $replyed->replyedOfB=$sub_a.$sub_b;
                                            $replyed->save();
                                            return $replyed->replyedOfB;
                                        };
                                    }
                                }
                            }
                        }
                        else break;
                    }
                    $num.=$replyed->replyedOfB[$y];
                }
            }
        }
    }
}