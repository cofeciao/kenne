<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 06-Jul-18
 * Time: 4:00 PM
 */

$config = [
    'defaultRoute' => 'calendar/index',
//    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@calendarweb' => '@backend/modules/calendar/web',
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
