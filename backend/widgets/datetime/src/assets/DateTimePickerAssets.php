<?php

namespace modava\datetime\assets;

use yii\web\AssetBundle;

class DateTimePickerAssets extends AssetBundle
{
    public $sourcePath = '@bower/smalot-bootstrap-datetimepicker';

    public $css = [
        'css/bootstrap-datetimepicker.css'
    ];

    public $js = [
        'js/bootstrap-datetimepicker.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
