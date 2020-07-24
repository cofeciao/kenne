<?php
namespace modava\filemanager\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/filemanager/views/error/error.php';

}
