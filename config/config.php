<?php

define('ISCLI', PHP_SAPI === 'cli');
define('CONSOLE_HOST', 1);
define('UPLOAD_PATH', 'frontend');
define('YII2_CACHE', false);
define('YII2_DEBUG', false);
define('YII2_MAIL', true);
define('YII2_LOG', true);
define('LINK_ASSETS', true);
define('SITE_ADMIN', 'Dashboard');
define('WEB_ADMIN', 'Administrator');
define('ADMIN_EMAIL', 'mongdaovan86.wd@gmail.com');
define('ROBOT_EMAIL', 'mongdao.wd@gmail.com');
define('FRONTEND_HOST_INFO', $domain);
define('FRONTEND_BASE_URL', '/');
define('BACKEND_HOST_INFO', $domain . '/backend');
define('BACKEND_BASE_URL', '/backend');

define('RECAPTCHA_GOOGLE_SITEKEY', '6LcvUX8UAAAAAJiAz5q09iS_5nKPJcUluZW6wxpZ');
define('RECAPTCHA_GOOGLE_SECRETKEY', '6LcvUX8UAAAAAAQv025aD6luMNd2llYX_bQWtjCi');

define('WEB_COOKIE_VALIDATION_KEY', 'hXxYdJJVHPJjqDfFvY0DW4_FDYIa5RcS');
define('FRONTEND_COOKIE_VALIDATION_KEY', 'CU9aseEPkKKG4TpJN5gySlVpV7pco-2P');
define('BACKEND_COOKIE_VALIDATION_KEY', 'hXxYdJJVHPJjqDfFvY0DW4_FDYIa5RcS');
define('INFORMATION_EMAIL', 'mongdaovan86@yahoo.com || mongdaovan86.wd@gmail.com');
define('INFORMATION_PHONE', '0906.904.884');
define('NOIMAGE', 'no-image.png');

define('NOIMAGE', 'no-image.png');

$config = [
    'vendorPath' => __DIR__ . '/../../vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'sourceLanguage' => 'en-US',
    'language' => 'vi',
//    'bootstrap' => ['devicedetect', 'assetsAutoCompress'],
    'bootstrap' => ['log', 'devicedetect'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'controllerMap' => [
    ],
    'timeZone' => 'Asia/Ho_Chi_Minh',
    'modules' => require __DIR__ . '/modules.php',
    'components' => require __DIR__ . '/components.php',
    'params' => require __DIR__ . '/params.php',
];

//Cấu hình kết nối CSDL
$config['components']['db'] = [
    'class' => yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;dbname=dev',
    'username' => 'root',
    'password' => '12081986',
    'tablePrefix' => '',
    'charset' => 'utf8mb4',
    'enableSchemaCache' => YII_ENV_PROD,
];

//Cấu hình gửi mail và ghi log
if (YII2_MAIL) {
    $config['components']['mailer'] = [
        'class' => 'yii\swiftmailer\Mailer',
        'viewPath' => '@backend/mail',
        'useFileTransport' => false,
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'mongdao.wd@gmail.com',
            'password' => 'qtlqfvknyclgfwbv',
            'port' => '587',
            'encryption' => 'tls',
            'streamOptions' => [
                'ssl' => [
                    'verify_peer' => false,
                    'allow_self_signed' => true
                ],
            ]
        ],
    ];
    $config['components']['log'] = [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            'db' => [
                'class' => 'yii\log\DbTarget',
                'levels' => ['error', 'warning'],
                'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                'prefix' => function () {
                    $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                    return sprintf('[%s][%s]', Yii::$app->id, $url);
                },
                'logVars' => [],
                'logTable' => '{{%system_log}}'
            ],
            'email' => [
                'class' => 'yii\log\EmailTarget',
                'levels' => ['error'],
                'message' => [
                    'from' => 'mongdao.wd@gmail.com',
                    'to' => 'mongdao.wd@gmail.com',
                    'subject' => 'Log project',
                ],
            ],
        ],
    ];
}


if (YII2_DEBUG && ISCLI == false) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1', '172.17.42.1', '172.17.0.1', '192.168.99.1'],
    ];
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
        'generators' => [
            'module' => [
                'class' => \modava\generators\module\Generator::class,
            ],
            'model' => [
                'class' => \modava\generators\model\Generator::class,
            ],
            'crud' => [
                'class' => \modava\generators\crud\Generator::class,
            ],
        ]
    ];
}

return $config;