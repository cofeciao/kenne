<?php
use modava\filemanager\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'filemanager/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@filemanagerweb' => '@modava/filemanager/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
