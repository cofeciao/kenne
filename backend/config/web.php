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

if (YII2_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
        'generators' => [
            'module' => [
                'class' => \backend\generators\module\Generator::class,
                'templates' => ['generators' => '@app/backend/generators/module/Generator']
            ],
            'model' => [
                'class' => \backend\generators\model\Generator::class,
                'templates' => ['generators' => '@app/backend/generators/model/Generator']
            ],
            'crud' => [
                'class' => \backend\generators\crud\Generator::class,
                'templates' => ['generators' => '@app/backend/generators/crud/Generator']
            ],
        ]
    ];
}

return $config;
