<?php

namespace common\behaviors;

use yii\base\Behavior;
use yii\web\User;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class LoginTimestampBehavior extends Behavior
{
    /**
     * @var string
     */
    public $attribute = 'logged_at';


    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            User::EVENT_AFTER_LOGIN => 'afterLogin'
        ];
    }

    /**
     * @param $event \yii\web\UserEvent
     */
    public function afterLogin($event)
    {
        //Set thời gian online của User
        $cache = \Yii::$app->cache;
<<<<<<< HEAD
        $key = 'redis-user-online-' . \Yii::$app->user->id;
=======
        $key = 'redis-user-online-' . \Yii::$app->user->identity->getId();
>>>>>>> master
        $valueUser = true;
        $cache->set($key, $valueUser, time() + 600);

        $user = $event->identity;
        $user->touch($this->attribute);
        $user->save(false);
    }
}
