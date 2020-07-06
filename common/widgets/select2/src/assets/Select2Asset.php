<?php

namespace modava\select2\assets;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    public $sourcePath = '@backendWeb';

    public $css = [
        'vendors/select2/dist/css/select2.min.css',
    ];

    public $js = [
        'vendors/select2/dist/js/select2.full.min.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
