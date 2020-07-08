<?php
use modava\website\WebsiteModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'websiteName' => 'Website',
    'websiteVersion' => '1.0',
    'status' => [
        '0' => WebsiteModule::t('website', 'Tạm ngưng'),
        '1' => WebsiteModule::t('website', 'Hiển thị'),
    ]
];
