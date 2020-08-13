<?php
/**
 * Created by PhpStorm.
 * User: mongd
 * Date: 29-Jul-18
 * Time: 9:54 PM
 */

return [
//    'geoip' => ['class' => 'lysenkobv\GeoIP\GeoIP'],
    'errorHandler' => [
        'errorAction' => 'site/error'
    ],
    'request' => [
        'enableCookieValidation' => true,
        'cookieValidationKey' => FRONTEND_COOKIE_VALIDATION_KEY,
        'baseUrl' => '',
    ],
    'assetManager' => [
        'appendTimestamp' => true,
        'bundles' => [
            'yii\web\JqueryAsset' => [
                'js' => [],
                'jsOptions' => ['position' => \yii\web\View::POS_END],
            ],
            'yii\bootstrap\BootstrapPluginAsset' => [
                'js' => []
            ],
            'yii\bootstrap\BootstrapAsset' => ['css' => ['/css/bootstrap.min.css']],
        ],
    ],

    /*'authManager' => [
        'class' => 'yii\rbac\DbManager',
        'defaultRoles' => ['user_users'],
    ],*/

    'user' => [
        'class' => yii\web\User::class,
        'identityClass' => frontend\models\Account::class,
        'loginUrl' => ['/site/login'],
        'enableAutoLogin' => true,
        'as afterLogin' => common\behaviors\LoginTimestampBehavior::class
    ],

    'urlManager' => require(__DIR__ . '/_urlManager.php'),
    'cache' => require(__DIR__ . '/_cache.php'),
];