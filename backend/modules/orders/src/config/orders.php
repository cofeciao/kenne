<?php
use modava\orders\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'orders/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@ordersweb' => '@modava/orders/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
