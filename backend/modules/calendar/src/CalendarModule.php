<?php

namespace modava\calendar;

use yii\base\BootstrapInterface;
use Yii;
use yii\base\Event;
use \yii\base\Module;
use yii\web\Application;
use yii\web\Controller;

/**
 * calendar module definition class
 */
class CalendarModule extends Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'modava\calendar\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // custom initialization code goes here
        $this->registerTranslations();
        parent::init();
        Yii::configure($this, require(__DIR__ . '/config/calendar.php'));
//        $handler = $this->get('errorHandler');
//        Yii::$app->set('errorHandler', $handler);
//        $handler->register();
        $this->layout = 'calendar';
    }



    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_ACTION, function () {

        });
        Event::on(Controller::class, Controller::EVENT_BEFORE_ACTION, function (Event $event) {
            $controller = $event->sender;
        });
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['calendar/messages/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@modava/calendar/messages',
            'fileMap' => [
                'calendar/messages/calendar' => 'calendar.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('calendar/messages/' . $category, $message, $params, $language);
    }
}
