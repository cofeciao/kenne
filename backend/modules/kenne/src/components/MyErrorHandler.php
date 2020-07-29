<?php
namespace modava\kenne\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/kenne/views/error/error.php';

}
