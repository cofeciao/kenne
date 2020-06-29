<?php

namespace backend\modules\calendar;

use Yii;
use \yii\base\Module;


class CalendarModule extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\calendar\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        // custom initialization code goes here
        parent::init();
        Yii::configure($this, require(__DIR__ . '/config/calendar.php'));
        $this->layout = 'calendar';
    }

}
