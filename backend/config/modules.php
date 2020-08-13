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
<<<<<<< HEAD
=======
        'shouldBeActivated' => false,
        'enableLoginByPass' => false,
>>>>>>> master
    ],
    'contact' => [
        'class' => 'modava\contact\ContactModule',
    ],
    'article' => [
        'class' => 'modava\article\ArticleModule',
    ],
    'filemanager' => [
<<<<<<< HEAD
        'class' => 'backend\modules\filemanager\FilemanagerModule',
    ],
    'calendar' => [
        'class' => 'backend\modules\calendar\CalendarModule',
=======
        'class' => 'modava\filemanager\FilemanagerModule',
        'upload_dir' => '../../../../../../frontend/web',
    ],
    'calendar' => [
        'class' => 'modava\calendar\CalendarModule',
>>>>>>> master
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
<<<<<<< HEAD
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
=======
    'location' => [
        'class' => 'modava\location\LocationModule',
    ],
    'log' => [
        'class' => 'modava\log\LogModule',
>>>>>>> master
    ],
    'comment' => [
        'class' => 'modava\comment\CommentModule',
    ],
<<<<<<< HEAD
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
=======
    'affiliate' => [
        'class' => 'modava\affiliate\AffiliateModule',
    ],
    'iway' => [
        'class' => 'modava\iway\IwayModule',
    ],
    'pages' => [
        'class' => 'modava\pages\PagesModule',
    ],
    'video' => [
        'class' => 'modava\video\VideoModule',
    ],
    'slide' => [
        'class' => 'modava\slide\SlideModule',
    ],
    'faq' => [
        'class' => 'modava\faq\FaqModule',
    ],
    'api' => [
        'class' => 'backend\modules\api\Api',
>>>>>>> master
    ],
];
