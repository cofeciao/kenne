<?php
namespace modava\slide\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/slide/views/error/error.php';

}
