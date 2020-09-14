<?php

namespace modava\charts;

use yii\web\AssetBundle;


class BarChartCustomAssets extends AssetBundle
{
    public $sourcePath = '@modava/charts';

    public $css = [];

    public $js = [
        'assets/js/chart-helper.js',
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