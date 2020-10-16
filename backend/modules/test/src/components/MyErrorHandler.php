<?php
namespace modava\test\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/test/views/error/error.php';

}
