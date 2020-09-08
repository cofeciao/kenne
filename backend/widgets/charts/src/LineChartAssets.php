<?php

namespace modava\charts;


use yii\web\AssetBundle;

class LineChartAssets extends AssetBundle
{
    public $sourcePath = '@modava-assets';

    public $css = [
        'vendors/morris.js/morris.css',
    ];

    public $js = [
        'vendors/morris.js/morris.min.js',
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