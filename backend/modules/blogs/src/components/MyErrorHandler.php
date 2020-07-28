<?php
namespace modava\blogs\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/blogs/views/error/error.php';

}
