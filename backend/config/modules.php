<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 04-Jun-18
 * Time: 11:02 AM
 */

return [
    'auth' => [
        'class' => 'modava\auth\AuthModule',
        'shouldBeActivated' => false,
        'enableLoginByPass' => false,
    ],
    'contact' => [
        'class' => 'modava\contact\ContactModule',
    ],
    'article' => [
        'class' => 'modava\article\ArticleModule',
    ],
    'filemanager' => [
        'class' => 'modava\filemanager\FilemanagerModule',
        'upload_dir' => '../../../../../../frontend/web',
    ],
    'calendar' => [
        'class' => 'modava\calendar\CalendarModule',
    ],
    'product' => [
        'class' => 'modava\product\ProductModule',
        'upload_dir' => '@frontend',
    ],
    'customer' => [
        'class' => 'modava\customer\CustomerModule'
    ],
    'marketing' => [
        'class' => 'modava\marketing\MarketingModule',
    ],
    'website' => [
        'class' => 'modava\website\WebsiteModule',
    ],
    'location' => [
        'class' => 'modava\location\LocationModule',
    ],
    'log' => [
        'class' => 'modava\log\LogModule',
    ],
    'comment' => [
        'class' => 'modava\comment\CommentModule',
    ],
    'test' => [
        'class' => 'modava\test\TestModule',
    ],
    'products' => [
        'class' => 'modava\products\ProductsModule',
    ],
    'transactions' => [
            'class' => 'modava\transactions\TransactionsModule',
        ],
    'orders' => [
        'class' => 'modava\orders\OrdersModule',
    ],
    'categories' => [
        'class' => 'modava\categories\CategoriesModule',
    ],
    'blogs' => [
        'class' => 'modava\blogs\BlogsModule',
    ],
    'kenne' => [
        'class' => 'modava\kenne\KenneModule',
    ],
    'test' => [
        'class' => 'modava\test\TestModule',
    ],
];
