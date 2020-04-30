<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 06-Jul-18
 * Time: 4:00 PM
 */

use modava\contact\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'contact/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@contactweb' => '@modava/contact/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
