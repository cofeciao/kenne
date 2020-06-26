<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 04-Jun-18
 * Time: 11:02 AM
 */

return [
    'reCaptcha' => [
        'name' => 'reCaptcha',
        'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
        'siteKeyV2' => RECAPTCHA_GOOGLE_SITEKEY,
        'secretV2' => RECAPTCHA_GOOGLE_SECRETKEY,
    ],
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

    'db' => require __DIR__ . '/_db.php',
    'db2' => require __DIR__ . '/_db2.php',
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
                'on missingTranslation' => [backend\modules\i18n\Module::class, 'missingTranslation']
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
    ]
];
