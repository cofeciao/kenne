<?php

namespace modava\filemanager\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MyFilemanagerAsset extends AssetBundle
{
    public $sourcePath = '@filemanagerweb';
    public $css = [
        'css/customFilemanager.css',
    ];
    public $js = [
        'js/customFilemanager.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
