<?php

return [
    'class' => 'frontend\filters\MyAccessControl',
    'rules' => [
        [
            'controllers' => ['site', 'shop', 'blog', 'contact-us', 'about-us', 'account', 'login', 'wishlist', 'cart', 'checkout'],
            'allow' => true,
        ],
    ]
];