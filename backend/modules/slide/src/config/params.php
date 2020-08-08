<?php
use modava\slide\SlideModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'slideName' => 'Slide',
    'slideVersion' => '1.0',
    'status' => [
        '0' => SlideModule::t('slide', 'Tạm ngưng'),
        '1' => SlideModule::t('slide', 'Hiển thị'),
    ]
];
