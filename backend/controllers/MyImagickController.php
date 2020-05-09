<?php


namespace backend\controllers;

use modava\imagick\Imagick;
use backend\components\MyController;
use yii\helpers\Url;

class MyImagickController extends MyController
{
    public function actionIndex()
    {
        $path = Url::to('@backend/web/imagick/ToanTam1200px.jpg');
        $pathWtm = Url::to('@backend/web/imagick/favicon.ico');
        $pathSave = Url::to('@backend/web/imagick/result/');
        $MyImagick = new Imagick($path);
        $xPosition = 'center';
        $yPosition = 'center';
        $a = $MyImagick->borderImage()->saveTo($pathSave);
        var_dump($a);die;
    }
}