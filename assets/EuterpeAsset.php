<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class EuterpeAsset extends AssetBundle
{
    public $sourcePath = null;
    public $css = [
        '/css/euterpe.css',
        '//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css',
    ];
    public $js = [
        '//cdn.bootcss.com/jquery/3.1.0/jquery.min.js',
        '//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js',
        '//cdn.jsdelivr.net/jquery.color-animation/1/mainfile',
    ];
    public $depends = [
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
