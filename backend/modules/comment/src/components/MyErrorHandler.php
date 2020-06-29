<?php
namespace modava\comment\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/comment/views/error/error.php';

}
