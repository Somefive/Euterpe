<?php
/**
 * Created by PhpStorm.
 * User: bingochen
 * Date: 2016/3/8
 * Time: 8:48
 */

namespace app\models\course;

use yii\base\Model;
use Yii;

class VocabularyForm extends Model
{
    public $word;
    public $reason;

    public function createVocabulary()
    {
        $voc = new VocabularyForm();
        if($word!=null)
            $voc = new Vocabulary();
        $voc->word = $word;
        $voc->reason = $reason;
        $voc->save();
    }
}