<?php
namespace modava\categories\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/categories/views/error/error.php';

}
