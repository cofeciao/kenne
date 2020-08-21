<?php
use modava\iway\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'iway/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@iwayweb' => '@modava/iway/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
