<?php
use modava\kenne\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'kenne/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@kenneweb' => '@modava/kenne/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
