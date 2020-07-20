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
        $MyImagick = new Imagick('https://myauris.vn/img/hoang.nguyen/news/tin-tuc/ngoisao-1.jpg', true);
        $a = $MyImagick->thumbnail(400,400)->saveTo($pathSave);
        var_dump(explode('backend/web', $a)[1]);die;
    }
}