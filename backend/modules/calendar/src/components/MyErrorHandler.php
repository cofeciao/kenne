<?php
namespace modava\calendar\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/calendar/views/error/error.php';

}
