<?php
namespace modava\location\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/location/views/error/error.php';

}
