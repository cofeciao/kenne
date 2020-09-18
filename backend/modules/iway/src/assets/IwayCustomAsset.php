<?php

namespace modava\iway\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class IwayCustomAsset extends AssetBundle
{
    public $sourcePath = '@iwayweb';
    public $css = [
        'css/customIway.css',
        'css/lightslider.css'
    ];
    public $js = [
        'js/customIway.js',
        'js/lightslider.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
