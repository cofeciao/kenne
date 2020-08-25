<?php

namespace modava\location\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LocationCustomAsset extends AssetBundle
{
    public $sourcePath = '@locationweb';
    public $css = [
        'css/customLocation.css',
    ];
    public $js = [
        'js/location.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
