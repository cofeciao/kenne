<?php
$config = [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'homeUrl' => Yii::getAlias('@frontendUrl'),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'bootstrap' => ['log'],
    'sourceLanguage' => 'en-US',
    'language' => 'vi',
    'modules' => require __DIR__ . '/modules.php',
    'components' => require __DIR__ . '/components.php',
    'as globalAccess' => require __DIR__ . '/behaviors.php',
    'params' => require __DIR__ . '/params.php',
];

return $config;
