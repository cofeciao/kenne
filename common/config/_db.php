<?php
if (YII2_ENV_DEV) {
    return [
        'class' => yii\db\Connection::class,
        'dsn' => 'mysql:host=localhost;dbname=project',
        'username' => 'root',
        'password' => '',
        'tablePrefix' => '',
        'charset' => 'utf8mb4',
        'enableSchemaCache' => YII_ENV_PROD,
    ];
} else {
    return [
        'class' => yii\db\Connection::class,
        'dsn' => 'mysql:host=localhost;dbname=project',
        'username' => '',
        'password' => '',
        'tablePrefix' => '',
        'charset' => 'utf8mb4',
        'enableSchemaCache' => YII_ENV_PROD,
    ];
}
