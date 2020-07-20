<?php
namespace modava\contact\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/contact/views/error/error.php';

}
