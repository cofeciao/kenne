<?php

namespace backend\modules\calendar\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CalendarAsset extends AssetBundle
{
    public $sourcePath = '@calendarweb';
    public $css = [
        'vendors/fullcalendar/dist/fullcalendar.min.css',
        'vendors/daterangepicker/daterangepicker.css',
    ];
    public $js = [
        'vendors/moment/min/moment.min.js',
        'vendors/jquery-ui.min.js',
        'vendors/fullcalendar/dist/fullcalendar.min.js',
        'vendors/daterangepicker/daterangepicker.js',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
