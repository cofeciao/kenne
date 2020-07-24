<?php
use modava\blogs\BlogsModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'blogsName' => 'Blogs',
    'blogsVersion' => '1.0',
    'status' => [
        '0' => BlogsModule::t('blogs', 'Tạm ngưng'),
        '1' => BlogsModule::t('blogs', 'Hiển thị'),
    ]
];
