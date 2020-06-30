<?php

namespace modava\contact\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ContactCustomAsset extends AssetBundle
{
    public $sourcePath = '@contactweb';
    public $css = [
        'css/customContact.css',
    ];
    public $js = [
        'js/customContact.js'
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
