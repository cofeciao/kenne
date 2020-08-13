<?php

namespace common\components;

use Yii;

<<<<<<< HEAD

=======
>>>>>>> master
class Component
{
    public static function setCookies($name, $value, $time = null)
    {
<<<<<<< HEAD
        //Yii::$app->request->enableCookieValidation = true;
=======
>>>>>>> master
        $cookies = Yii::$app->response->cookies;
        if ($time == null) {
            $time = time() + 86400 * 365;
        }
        $cookies->add(new \yii\web\Cookie([
            'name' => $name,
            'value' => $value,
            'expire' => $time,
        ]));
    }

    public static function getCookies($name)
    {
        $cookies = Yii::$app->request->cookies;
        if (isset($cookies[$name])) {
            return $cookies[$name]->value;
        }
        return false;
    }

    public static function hasCookies($name)
    {
        $cookies = Yii::$app->request->cookies;
        return $cookies->has($name);
    }
<<<<<<< HEAD

    public static function removeCookies($name){
        $cookies = Yii::$app->response->cookies;
        $cookies->remove($name);
        return $cookies;
    }
=======
>>>>>>> master
}