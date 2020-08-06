<?php

namespace modava\calendar\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MyCalendarAsset extends AssetBundle
{
    public $sourcePath = '@calendarweb';
    public $css = [
        'css/customCalendar.css',
    ];
    public $js = [
        'js/customCalendar.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
