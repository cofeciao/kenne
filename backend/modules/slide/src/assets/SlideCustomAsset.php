<?php

namespace modava\slide\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class SlideCustomAsset extends AssetBundle
{
    public $sourcePath = '@slideweb';
    public $css = [
        'css/customSlide.css',
    ];
    public $js = [
        'js/customSlide.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
