<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/vendor/bootstrap.min.css',
        '/css/vendor/font-awesome.min.css',
        '/css/vendor/fontawesome-stars.min.css',
        '/css/vendor/ion-fonts.css',
        '/css/plugins/slick.css',
        '/css/plugins/animate.css',
        '/css/plugins/jquery-ui.min.css',
        '/css/plugins/nice-select.css',
        '/css/plugins/timecircles.css',
        '/css/style.css',
        '/css/custom.css',
        '/css/bootstrap.min.css',
        '/css/jquery.toast.min.css',
    ];
    public $js = [
        '/js/vendor/jquery-1.12.4.min.js',
        '/js/vendor/modernizr-2.8.3.min.js',
        '/js/vendor/popper.min.js',
        '/js/vendor/bootstrap.min.js',
        '/js/plugins/slick.min.js',
        '/js/plugins/jquery.barrating.min.js',
        '/js/plugins/jquery.counterup.js',
        '/js/plugins/jquery.nice-select.js',
        '/js/plugins/jquery.sticky-sidebar.js',
        '/js/plugins/jquery-ui.min.js',
        '/js/plugins/jquery.ui.touch-punch.min.js',
        '/js/plugins/theia-sticky-sidebar.min.js',
        '/js/plugins/waypoints.min.js',
        '/js/plugins/jquery.zoom.min.js',
        '/js/plugins/timecircles.js',
        '/js/main.js',
        '/js/custom.js',
        '/js/jquery.toast.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
