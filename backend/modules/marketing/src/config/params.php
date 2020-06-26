<?php
use modava\marketing\MarketingModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'marketingName' => 'Marketing',
    'marketingVersion' => '1.0',
    'status' => [
        '0' => MarketingModule::t('marketing', 'Tạm ngưng'),
        '1' => MarketingModule::t('marketing', 'Hiển thị'),
    ]
];
