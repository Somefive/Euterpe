<?php

namespace app\components\wiki;

use yii\base\Widget;

class WikiCard extends Widget {

    public $wiki;

    public function run() {
        return $this->render("@app/components/wiki/view/WikiCard",["wiki"=>$this->wiki]);
    }
}
?>