<?php

namespace common\widgets\assets;

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
}
