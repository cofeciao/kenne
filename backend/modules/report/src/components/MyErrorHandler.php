<?php
namespace modava\report\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/report/views/error/error.php';

}
