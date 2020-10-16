<?php
use modava\categories\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'categories/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@categoriesweb' => '@modava/categories/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
