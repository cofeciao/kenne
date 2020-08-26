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
    ],
];
