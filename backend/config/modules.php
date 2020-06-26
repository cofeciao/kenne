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
    'article1' => [
        'class' => 'modava\article1\Article1Module',
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

    'user' => [
        'class' => 'backend\modules\user\User',
        'shouldBeActivated' => false,
        'enableLoginByPass' => false,
    ],
    'option' => [
        'class' => 'backend\modules\option\Option',
    ],
    'location' => [
        'class' => 'modava\location\LocationModule',
    ],
    'setting' => [
        'class' => 'backend\modules\setting\Setting',
    ],
    'api' => [
        'class' => 'backend\modules\api\Api',
    ],
    'quytac' => [
        'class' => 'backend\modules\quytac\Quytac',
    ],
    'general' => [
        'class' => 'backend\modules\general\General',
    ],
    'log' => [
        'class' => 'backend\modules\log\Log',
    ],
    'support' => [
        'class' => 'backend\modules\support\Support',
    ],
    'helper' => [
        'class' => 'backend\modules\helper\Helper',
    ],
    'social' => [
        'class' => 'modava\social\SocialModule',
    ],
    'settings' => [
        'class' => 'modava\settings\SettingsModule',
    ],
    'report' => [
        'class' => 'modava\report\ReportModule',
    ],
    'comment' => [
        'class' => 'modava\comment\CommentModule',
    ],
];
