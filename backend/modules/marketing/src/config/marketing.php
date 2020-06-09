<?php
use modava\marketing\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'marketing/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@marketingweb' => '@modava/marketing/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
