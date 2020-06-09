<?php
use modava\social\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'social/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@socialweb' => '@modava/social/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
