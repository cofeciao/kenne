<?php

namespace modava\charts;

use yii\web\AssetBundle;


class BarChartAssets extends AssetBundle
{
    public $sourcePath = '@modava-assets';

    public $css = [];

    public $js = [
        'vendors/echarts/dist/echarts-en.min.js',
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();
    }
}