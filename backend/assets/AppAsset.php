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
        'css/style.css'
    ];
    public $js = [
        'js/init-chart.js'
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

        $content = @file_get_contents(\Yii::getAlias('@backendWeb/assets.json'));
        $assetsData = json_decode($content, true);

        if (!empty($assetsData['scripts'])) {
            foreach ($assetsData['scripts'] as $script) {
                    $this->js[] = 'js/' . $script['name'] . '.js';
            }
        }

        if (!empty($assetsData['styles'])) {
            foreach ($assetsData['styles'] as $style) {
                    $this->css[] = 'css/' . $style['name'] . '.css';
            }
        }

    }
}
