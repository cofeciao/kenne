<?php
/* @var $generator yii\gii\generators\model\Generator */
?>
<?= "<?php" ?>

namespace modava\<?= $generator->moduleID ?>\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class <?= ucfirst($generator->moduleID) ?>Asset extends AssetBundle
{
    public $sourcePath = '@<?= $generator->moduleID ?>web';
    public $css = [

    ];
    public $js = [

    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
