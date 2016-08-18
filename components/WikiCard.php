<?php

namespace app\components;

use yii\base\Widget;

class WikiCard extends Widget {

    public $wiki;

    public function run() {
        return $this->render("WikiCard",["wiki"=>$this->wiki]);
    }
}
?>