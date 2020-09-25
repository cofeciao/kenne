<?php

return [
    'class' => 'common\filters\MyAccessControl',
    'rules' => [
        [
            'allow' => true,
            'actions' => ['login', 'submit-login', 'request-password-reset', 'reset-password'],
            'roles' => ['?']
        ],
        [
            'allow' => true,
            'actions' => ['logout'],
            'roles' => ['@']
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
