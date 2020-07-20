<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 04-Jun-18
 * Time: 11:02 AM
 */

use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;

return [
    'robotsTxt' => [
        'class' => 'execut\robotsTxt\Module',
        'components' => [
            'generator' => [
                'class' => \execut\robotsTxt\Generator::class,
                'host' => FRONTEND_HOST_INFO,
                'sitemap' => FRONTEND_HOST_INFO . '/sitemap.xml',

                'userAgent' => [
                    '*' => [
                        'Disallow' => [
                            '/backend/',
                            '/readme.html',
                            '/license.txt',
                        ],
                        'Allow' => [
                        ],
                    ],
                ],
            ],
        ],
    ],
    'sitemap' => [
        'class' => 'himiklab\sitemap\Sitemap',
        'models' => [
//            [
//                'class' => 'frontend\models\Video',
//                'behaviors' => [
//                    'sitemap' => [
//                        'class' => SitemapBehavior::class,
//                        'scope' => function ($model) {
//                            /** @var \yii\db\ActiveQuery $model */
//                            $model->select(['slug', 'created_at']);
//                            $model->andWhere(['status' => 1]);
//                        },
//                        'dataClosure' => function ($model) {
//                            /** @var self $model */
//                            return [
//                                'loc' => Url::toRoute(['/video/view', 'slug' => $model['slug']], true),
//                                'lastmod' => date('c', $model['created_at']),
//                                'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
//                                'priority' => 0.8
//                            ];
//                        }
//                    ],
//                ],
//            ],
        ],

        'enableGzip' => true, // default is false
        'cacheExpire' => 1, // 1 second. Default is 24 hours
    ],
];