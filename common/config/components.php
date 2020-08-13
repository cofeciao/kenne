<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 04-Jun-18
 * Time: 11:02 AM
 */

return [
<<<<<<< HEAD
    'reCaptcha' => [
        'name' => 'reCaptcha',
        'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
        'siteKeyV2' => RECAPTCHA_GOOGLE_SITEKEY,
        'secretV2' => RECAPTCHA_GOOGLE_SECRETKEY,
    ],
=======
>>>>>>> master
    'devicedetect' => [
        'class' => 'alexandernst\devicedetect\DeviceDetect',
    ],
    'authManager' => [
        'class' => yii\rbac\DbManager::class,
        'cache' => 'cache',
        'itemTable' => '{{%rbac_auth_item}}',
        'itemChildTable' => '{{%rbac_auth_item_child}}',
        'assignmentTable' => '{{%rbac_auth_assignment}}',
        'ruleTable' => '{{%rbac_auth_rule}}',
//            'defaultRoles' => ['user'],
    ],

    'queue' => [
        'class' => \yii\queue\db\Queue::class,
        'db' => 'db', // DB connection component or its config
        'tableName' => '{{%queue}}', // Table name
        'channel' => 'default', // Queue channel key
        'mutex' => \yii\mutex\MysqlMutex::class, // Mutex used to sync queries
    ],

    'i18n' => [
        'translations' => [
            'app' => [
                'class' => yii\i18n\PhpMessageSource::class,
                'basePath' => '@common/messages',
            ],
            '*' => [
                'class' => yii\i18n\PhpMessageSource::class,
                'basePath' => '@common/messages',
                'fileMap' => [
                    'common' => 'common.php',
                    'backend' => 'backend.php',
                    'frontend' => 'frontend.php',
                ],
<<<<<<< HEAD
                'on missingTranslation' => [backend\modules\i18n\Module::class, 'missingTranslation']
=======
>>>>>>> master
            ],
        ],
    ],
    'assetManager' => [
        'class' => yii\web\AssetManager::class,
        'linkAssets' => LINK_ASSETS,
        'appendTimestamp' => true,
        'forceCopy' => true,
        'hashCallback' => function ($path) {
            return hash('md4', $path);
        }
    ],
<<<<<<< HEAD
    'request' => [
        //'cookieValidationKey' => FRONTEND_HOST_INFO,
        //Lấy key là domain
    ],
    'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'viewPath' => '@frontend/mail',
        'useFileTransport' => false,
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'runhitbtn2@gmail.com',
            'password' => 'Soccer98987@',
            'port' => '587',
            'encryption' => 'tls',
            'streamOptions' => [
                'ssl' => [
                    'verify_peer' => false,
                    'allow_self_signed' => true
                ],
            ]
        ],
=======
    'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'nullDisplay' => '-',
        'dateFormat' => 'php:d-m-Y',
        'datetimeFormat' => 'php:d-m-Y H:i:s',
        'timeFormat' => 'php:H:i:s',
        'locale' => 'vi_VN',
        'decimalSeparator' => ',',
        'thousandSeparator' => ' ',
//        'currencyCode' => '₫',
>>>>>>> master
    ],
];
