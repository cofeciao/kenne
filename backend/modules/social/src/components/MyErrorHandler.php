<?php
namespace modava\social\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/social/views/error/error.php';

}
