<?php
namespace modava\transactions\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/transactions/views/error/error.php';

}
