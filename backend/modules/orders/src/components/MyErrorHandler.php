<?php
namespace modava\orders\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/orders/views/error/error.php';

}
