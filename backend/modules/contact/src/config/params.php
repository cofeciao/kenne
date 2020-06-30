<?php
use modava\contact\ContactModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'contactName' => 'Contact',
    'contactVersion' => '1.0',
    'status' => [
        '0' => ContactModule::t('contact', 'Tạm ngưng'),
        '1' => ContactModule::t('contact', 'Hiển thị'),
    ]
];
