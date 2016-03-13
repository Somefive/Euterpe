<?php
/**
 * Created by PhpStorm.
 * User: bingochen
 * Date: 2016/3/8
 * Time: 8:48
 */

namespace app\models\course\share;

use yii\base\Model;
use app\models\account\User;
use Yii;

class VocabularyForm extends Model
{
    public $author = "gb";
    public $word;
    public $reason;

    public function rules()
    {
        return [
            [['word','author'],'required'],
        ];
    }

    public function createVocabulary()
    {
        if($this->word != null)
        {
            $voc = new Vocabulary();
            $voc->author = $this->author;
            $voc->word = $this->word;
            $voc->reason = $this->reason;
            return $voc->save();
        }
        return false;
    }
}