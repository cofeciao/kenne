<?php
use modava\settings\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'setting/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@settingsweb' => '@modava/settings/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
