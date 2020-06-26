<?php

namespace modava\report\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ReportAsset extends AssetBundle
{
    public $sourcePath = '@reportweb';
    public $css = [
        'vendors/bootstrap/dist/css/bootstrap.min.css',
        "vendors/jquery-toggles/css/toggles.css",
        "vendors/jquery-toggles/css/themes/toggles-light.css",
        'css/customReport.css',
    ];
    public $js = [
        "vendors/popper.js/dist/umd/popper.min.js",
        "vendors/bootstrap/dist/js/bootstrap.min.js",
        "vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js",
        'js/customReport.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
