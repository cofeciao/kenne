<?php
use modava\transactions\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'transactions/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@transactionsweb' => '@modava/transactions/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
