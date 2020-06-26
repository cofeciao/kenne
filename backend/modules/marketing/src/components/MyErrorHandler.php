<?php
namespace modava\marketing\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/marketing/views/error/error.php';

}
