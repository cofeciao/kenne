<?php
namespace modava\website\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/website/views/error/error.php';

}
