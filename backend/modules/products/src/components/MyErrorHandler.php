<?php
namespace modava\products\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/products/views/error/error.php';

}
