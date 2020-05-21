<?php

namespace modava\customer\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CustomerAsset extends AssetBundle
{
    public $sourcePath = '@customerweb';
    public $css = [
        'vendors/datatables.net-dt/css/jquery.dataTables.min.css',
        'vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css',
        'vendors/jquery-toggles/css/toggles.css',
        'vendors/jquery-toggles/css/themes/toggles-light.css',
        'css/customCustomer.css',
    ];
    public $js = [
        'dist/js/jquery.slimscroll.js',
        'vendors/datatables.net/js/jquery.dataTables.min.js',
        'vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
        'vendors/datatables.net-dt/js/dataTables.dataTables.min.js',
        'vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
        'vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
        'vendors/datatables.net-buttons/js/buttons.flash.min.js',
        'vendors/jszip/dist/jszip.min.js',
        'vendors/pdfmake/build/pdfmake.min.js',
        'vendors/pdfmake/build/vfs_fonts.js',
        'vendors/datatables.net-buttons/js/buttons.html5.min.js',
        'vendors/datatables.net-buttons/js/buttons.print.min.js',
        'vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
        'dist/js/dataTables-data.js',
        'dist/js/feather.min.js',
        'dist/js/dropdown-bootstrap-extended.js',
        'vendors/jquery-toggles/toggles.min.js',
        'dist/js/toggle-data.js',
        'dist/js/init.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
