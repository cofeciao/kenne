<?php
use modava\location\LocationModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'locationName' => 'Location',
    'locationVersion' => '1.0',
    'status' => [
        '0' => LocationModule::t('location', 'Tạm ngưng'),
        '1' => LocationModule::t('location', 'Hiển thị'),
    ]
];
