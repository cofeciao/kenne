<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ModavaAsset extends AssetBundle
{
    public $sourcePath = '@modava-assets';
    public $css = [
        'vendors/vectormap/jquery-jvectormap-2.0.3.css',
        'vendors/jquery-toggles/css/toggles.css',
        'vendors/jquery-toggles/css/themes/toggles-light.css',
        'vendors/jquery-toast-plugin/dist/jquery.toast.min.css',
        'dist/css/style.css',
    ];
    public $js = [
        'vendors/popper.js/dist/umd/popper.min.js',
        'vendors/bootstrap/dist/js/bootstrap.min.js',
        'dist/js/jquery.slimscroll.js',
        'dist/js/dropdown-bootstrap-extended.js',
        'dist/js/feather.min.js',
        'vendors/jquery-toggles/toggles.min.js',
        'dist/js/toggle-data.js',
        'vendors/raphael/raphael.min.js',
        'vendors/waypoints/lib/jquery.waypoints.min.js',
        'vendors/jquery.counterup/jquery.counterup.min.js',
        'vendors/echarts/dist/echarts-en.min.js',
        'vendors/jquery.sparkline/dist/jquery.sparkline.min.js',
        'vendors/vectormap/jquery-jvectormap-2.0.3.min.js',
        'vendors/vectormap/jquery-jvectormap-world-mill-en.js',
        'dist/js/vectormap-data.js',
        'vendors/owl.carousel/dist/owl.carousel.min.js',
        'vendors/jquery-toast-plugin/dist/jquery.toast.min.js',
        'dist/js/init.js',
        'dist/js/dashboard-data.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\widgets\ActiveFormAsset',
        'yii\validators\ValidationAsset'
    ];

    public function init()
    {
        parent::init();

        $content = @file_get_contents(\Yii::getAlias('@modava-assets/assets.json'));
        $assetsData = json_decode($content, true);

        if (!empty($assetsData['scripts'])) {
            foreach ($assetsData['scripts'] as $script) {
                    $this->js[] = 'my-js/' . $script['name'] . '.js';
            }
        }

        if (!empty($assetsData['styles'])) {
            foreach ($assetsData['styles'] as $style) {
                    $this->css[] = 'my-css/' . $style['name'] . '.css';
            }
        }

    }
}
