<?php
use modava\blogs\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'blogs/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@blogsweb' => '@modava/blogs/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
