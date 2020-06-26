<?php

namespace backend\modules\filemanager;

use Yii;
use \yii\base\Module;


class FilemanagerModule extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\filemanager\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        // custom initialization code goes here
        parent::init();
        Yii::configure($this, require(__DIR__ . '/config/filemanager.php'));
    }

}
