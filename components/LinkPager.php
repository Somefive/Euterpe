<?php

namespace app\components;

use yii\base\Widget;

class LinkPager extends Widget {

    public $current;
    public $total;
    public $url;

    public function run() {
        $array = [1];
        if($this->current-2>1 && $this->current-2<$this->total) array_push($array,$this->current-2);
        if($this->current-1>1 && $this->current-1<$this->total) array_push($array,$this->current-1);
        if($this->current>1 && $this->current<$this->total) array_push($array,$this->current);
        if($this->current+1>1 && $this->current+1<$this->total) array_push($array,$this->current+1);
        if($this->current+2>1 && $this->current+2<$this->total) array_push($array,$this->current+2);
        if($this->total>1) array_push($array, $this->total);
        return $this->render("LinkPager",["array"=>$array,"url"=>$this->url,"previous"=>($this->current>1)?$this->current-1:$this->current,"next"=>($this->current<$this->total)?$this->current+1:$this->total]);
    }
}