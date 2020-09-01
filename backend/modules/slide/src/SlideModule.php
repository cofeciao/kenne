<?php

namespace modava\slide;

use yii\base\BootstrapInterface;
use Yii;
use yii\base\Event;
use \yii\base\Module;
use yii\web\Application;
use yii\web\Controller;

/**
 * slide module definition class
 */
class SlideModule extends Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'modava\slide\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // custom initialization code goes here
//        $this->registerTranslations();
        parent::init();
        Yii::configure($this, require(__DIR__ . '/config/slide.php'));
//        $handler = $this->get('errorHandler');
//        Yii::$app->set('errorHandler', $handler);
//        $handler->register();
        $this->layout = 'slide';
    }



    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_ACTION, function () {

        });
        Event::on(Controller::class, Controller::EVENT_BEFORE_ACTION, function (Event $event) {
            $controller = $event->sender;
        });
    }

//    public function registerTranslations()
//    {
//        Yii::$app->i18n->translations['slide/messages/*'] = [
//            'class' => 'yii\i18n\PhpMessageSource',
//            'sourceLanguage' => 'en',
//            'basePath' => '@modava/slide/messages',
//            'fileMap' => [
//                'slide/messages/slide' => 'slide.php',
//            ],
//        ];
//    }
//
//    public static function t($category, $message, $params = [], $language = null)
//    {
//        return Yii::t('slide/messages/' . $category, $message, $params, $language);
//    }
}
