<?php

namespace modava\website\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class WebsiteCustomAsset extends AssetBundle
{
    public $sourcePath = '@websiteweb';
    public $css = [
        'css/customWebsite.css',
    ];
    public $js = [
        'js/customWebsite.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
