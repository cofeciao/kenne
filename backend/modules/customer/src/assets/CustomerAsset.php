<?php

namespace modava\customer\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CustomerAsset extends AssetBundle
{
    public $sourcePath = '@backendWeb';
    public $css = [
        'modava-assets/vendors/datatables.net-dt/css/jquery.dataTables.min.css',
        'modava-assets/vendors/bootstrap/dist/css/bootstrap.min.css',
        "modava-assets/vendors/jquery-toggles/css/toggles.css",
        "modava-assets/vendors/jquery-toggles/css/themes/toggles-light.css",
    ];
    public $js = [
        "modava-assets/vendors/popper.js/dist/umd/popper.min.js",
        "modava-assets/vendors/bootstrap/dist/js/bootstrap.min.js",
        "modava-assets/dist/js/jquery.slimscroll.js",
        "modava-assets/dist/js/dropdown-bootstrap-extended.js",
        "modava-assets/vendors/jquery-toggles/toggles.min.js",
        "modava-assets/dist/js/toggle-data.js",
        "modava-assets/vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js",
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
