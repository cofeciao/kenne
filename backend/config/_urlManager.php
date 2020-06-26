<?php
return [
    'class' => yii\web\UrlManager::class,
    'enablePrettyUrl' => true,
//    'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        ['pattern' => 'auth/login', 'route' => 'auth/auth/login', 'suffix' => '.html'],
        ['pattern' => 'auth/logout', 'route' => 'auth/auth/logout', 'suffix' => '.html'],
    ],
];
