<?php
namespace modava\location\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LocationAsset extends AssetBundle
{
    public $sourcePath = '@locationweb';
    public $css = [
        'css/customLocation.css',
    ];
    public $js = [

    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
