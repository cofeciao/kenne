<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backendWeb';
    public $css = [
        'modava-assets/vendors/vectormap/jquery-jvectormap-2.0.3.css',
        'modava-assets/vendors/jquery-toggles/css/toggles.css',
        'modava-assets/vendors/jquery-toggles/css/themes/toggles-light.css',
        'modava-assets/vendors/morris.js/morris.css',
        'modava-assets/vendors/jquery-toast-plugin/dist/jquery.toast.min.css',
        'modava-assets/dist/css/style.css',
        'modava-assets/css/custom.css',
    ];
    public $js = [
        'modava-assets/vendors/popper.js/dist/umd/popper.min.js',
        'modava-assets/vendors/bootstrap/dist/js/bootstrap.min.js',
        'modava-assets/dist/js/jquery.slimscroll.js',
        'modava-assets/dist/js/dropdown-bootstrap-extended.js',
        'modava-assets/dist/js/feather.min.js',
        'modava-assets/vendors/jquery-toggles/toggles.min.js',
        'modava-assets/dist/js/toggle-data.js',
        'modava-assets/vendors/raphael/raphael.min.js',
        'modava-assets/vendors/morris.js/morris.min.js',
        'modava-assets/vendors/waypoints/lib/jquery.waypoints.min.js',
        'modava-assets/vendors/jquery.counterup/jquery.counterup.min.js',
        'modava-assets/vendors/echarts/dist/echarts-en.min.js',
        'modava-assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js',
        'modava-assets/vendors/vectormap/jquery-jvectormap-2.0.3.min.js',
        'modava-assets/vendors/vectormap/jquery-jvectormap-world-mill-en.js',
        'modava-assets/dist/js/vectormap-data.js',
        'modava-assets/vendors/owl.carousel/dist/owl.carousel.min.js',
        'modava-assets/vendors/jquery-toast-plugin/dist/jquery.toast.min.js',
        'modava-assets/dist/js/init.js',
        'modava-assets/dist/js/dashboard-data.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
