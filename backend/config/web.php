<?php

$config = [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@backendWeb' => '@backend/web'
    ],
    'name' => SITE_ADMIN,
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'site/index',
    'components' => require __DIR__ . '/components.php',
    'modules' => require __DIR__ . '/modules.php',
    'as globalAccess' => require __DIR__ . '/behaviors.php',
    'params' => require __DIR__ . '/params.php',
];

return $config;
