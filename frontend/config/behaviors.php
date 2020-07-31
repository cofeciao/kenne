<?php

return [
    'class' => 'frontend\filters\MyAccessControl',
    'rules' => [
        [
            'controllers' => ['site', 'shop', 'blog', 'contact-us', 'about-us', 'account', 'sign', 'add-order', 'detail-product', 'detail-blog', 'wishlist', 'cart', 'checkout'],
            'allow' => true,
        ],
    ]
];