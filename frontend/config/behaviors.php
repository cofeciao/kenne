<?php

return [
    'class' => 'frontend\filters\MyAccessControl',
    'rules' => [
        [
<<<<<<< HEAD
            'controllers' => ['test','site', 'shop', 'blog', 'contact-us', 'about-us', 'account', 'sign', 'add-order', 'detail-product', 'detail-blog', 'wishlist', 'cart', 'checkout', 'news-letter'],
=======
            'controllers' => ['site'],
>>>>>>> master
            'allow' => true,
        ],
    ]
];