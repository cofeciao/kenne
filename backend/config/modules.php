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
    ],
    'contact' => [
        'class' => 'modava\contact\ContactModule',
    ],
    'article' => [
        'class' => 'modava\article\ArticleModule',
    ],
    'filemanager' => [
        'class' => 'backend\modules\filemanager\FilemanagerModule',
    ],
    'calendar' => [
        'class' => 'backend\modules\calendar\CalendarModule',
    ],
    'product' => [
        'class' => 'modava\product\ProductModule',
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
    'user' => [
        'class' => 'backend\modules\user\User',
        'shouldBeActivated' => false,
        'enableLoginByPass' => false,
    ],
    'location' => [
        'class' => 'modava\location\LocationModule',
    ],
    'api' => [
        'class' => 'backend\modules\api\Api',
    ],
    'log' => [
        'class' => 'backend\modules\log\Log',
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
];
