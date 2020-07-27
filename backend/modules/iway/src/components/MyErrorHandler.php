<?php
namespace modava\iway\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/iway/views/error/error.php';

}
