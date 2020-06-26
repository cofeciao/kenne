<?php

namespace modava\location\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LocationAsset extends AssetBundle
{
    public $sourcePath = '@locationweb';
    public $css = [
        'vendors/datatables.net-dt/css/jquery.dataTables.min.css',
        'vendors/bootstrap/dist/css/bootstrap.min.css',
        'css/customLocation.css',
    ];
    public $js = [
        'js/location.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
