<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 04-Jun-18
 * Time: 10:37 AM
 */

return \yii\helpers\ArrayHelper::merge(
    [
        'availableLocales' => [
            'vi' => 'Tiếng Việt',
            'en' => 'English',
            'jp' => 'Japan',
        ],
        'adminEmail' => ADMIN_EMAIL,
        'robotEmail' => ROBOT_EMAIL,
        'webAdmin' => WEB_ADMIN,
        'product' => [
            '150x150' => [
                'folder' => '/uploads/product/150x150/',
                'width' => 150,
                'height' => 150
            ],
            '300x300' => [
                'folder' => '/uploads/product/300x300/',
                'width' => 300,
                'height' => 300
            ],
        ],
        'product-category' => [
            '150x150' => [
                'folder' => '/uploads/product-category/150x150/',
                'width' => 150,
                'height' => 150
            ],
        ],
        'product-type' => [
            '150x150' => [
                'folder' => '/uploads/product-type/150x150/',
                'width' => 150,
                'height' => 150
            ],
        ],
        'article' => [
            '150x150' => [
                'folder' => '/uploads/article/150x150/',
                'width' => 150,
                'height' => 150
            ],
        ],
        'kenne' => [
            '150x150' => [
                'folder' => '/uploads/kenne/150x150/',
                'width' => 150,
                'height' => 150
            ],
            '1920x950' => [
                'folder' => '/uploads/product/1920x950/',
                'width' => 1920,
                'height' => 950
            ],
            '370x250' => [
                'folder' => '/uploads/product/370x250/',
                'width' => 370,
                'height' => 250
            ],
            '570x810' => [
                'folder' => '/uploads/product/570x810/',
                'width' => 570,
                'height' => 810
            ]

        ],
        'article-type' => [
            '150x150' => [
                'folder' => '/uploads/article-type/150x150/',
                'width' => 150,
                'height' => 150
            ],
        ],
        'article-category' => [
            '150x150' => [
                'folder' => '/uploads/article-category/150x150/',
                'width' => 150,
                'height' => 150
            ],
        ]
    ],

    require __DIR__ . '/configparams.php'
);
