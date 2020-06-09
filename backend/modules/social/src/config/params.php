<?php
use modava\social\SocialModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'socialName' => 'Social',
    'socialVersion' => '1.0',
    'status' => [
        '0' => SocialModule::t('social', 'Tạm ngưng'),
        '1' => SocialModule::t('social', 'Hiển thị'),
    ]
];
