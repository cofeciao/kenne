<?php

namespace modava\filemanager\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class FilemanagerAsset extends AssetBundle
{
    public $sourcePath = '@modava-assets';
    public $css = [
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
