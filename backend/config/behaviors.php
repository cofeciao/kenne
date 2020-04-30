<?php

return [
    'class' => 'common\filters\MyAccessControl',
    'rules' => [
        [
            'allow' => true,
            'actions' => ['login', 'submit-login'],
            'roles' => ['?']
        ],
        [
            'controllers' => ['site'],
            'allow' => true,
            'actions' => ['index'],
            'roles' => ['@'],
        ],
        [
            'allow' => true,
            'roles' => ['develop'],
        ]
    ],
];
