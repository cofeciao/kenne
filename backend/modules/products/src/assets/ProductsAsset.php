<?php

namespace modava\products\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ProductsAsset extends AssetBundle
{
    public $sourcePath = '@productsweb';
    public $css = [
        'vendors/datatables.net-dt/css/jquery.dataTables.min.css',
        'vendors/bootstrap/dist/css/bootstrap.min.css',
        'vendors/jquery-toggles/css/toggles.css',
        'vendors/jquery-toggles/css/themes/toggles-light.css',
        'css/customProducts.css',
    ];
    public $js = [
        "vendors/popper.js/dist/umd/popper.min.js",
        "vendors/bootstrap/dist/js/bootstrap.min.js",
        "vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js",
        'js/customProducts.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
