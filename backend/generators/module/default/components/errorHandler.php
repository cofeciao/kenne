<?php
/* @var $generator yii\gii\generators\model\Generator */
?>
<?= "<?php" ?>

namespace modava\<?= $generator->moduleID ?>\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/<?= $generator->moduleID ?>/views/error/error.php';

}
