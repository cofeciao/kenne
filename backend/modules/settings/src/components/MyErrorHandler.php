<?php
namespace modava\settings\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/settings/views/error/error.php';

}
