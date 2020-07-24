<?php
use modava\calendar\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'calendar/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@calendarweb' => '@modava/calendar/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
