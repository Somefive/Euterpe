<?php

namespace app\components\wiki;

use yii\base\Widget;

class WikiEditor extends Widget {

    public function run() {
        return $this->render("@app/components/wiki/view/WikiEditor");
    }
}
?>