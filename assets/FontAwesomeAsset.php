<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/12
 * Time: 13:03
 */
namespace app\assets;
use yii\web\AssetBundle;
class FontAwesomeAsset extends AssetBundle
{
    // 下面这些资源文件并不在 web 目录下，浏览器无法直接访问。所以我们需要
    // 指定 sourcePath 属性。注意 @vendor 这个 alias，表示 vender 目录
    public $sourcePath = '@vendor/fortawesome/font-awesome';
    public $css = [
        'css/font-awesome.css',
    ];
}