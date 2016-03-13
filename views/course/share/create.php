<?php
/**
 * Created by PhpStorm.
 * User: bingochen
 * Date: 2016/3/6
 * Time: 11:34
 */
use app\models\account\User;

$this->title = 'New Share';
$this->params['breadcrumbs'] = [
    ['label'=>'course','url'=>'/course/index'],
    ['label'=>'composer','url'=>'/course/share/index'],
    $this->title
];
echo User::getAppUser()->getId();
echo User::getAppUser()->username;
echo 'fuck';