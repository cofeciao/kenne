<?php
namespace modava\tinymce;

use yii\web\AssetBundle;

class TinyMceLangAsset extends AssetBundle
{
    public $sourcePath = '@vendor/modava/tiny/src/assets';

    public $depends = [
        'modava\tiny\TinyMceAsset'
    ];
}
