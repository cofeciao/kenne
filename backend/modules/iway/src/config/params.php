<?php
use modava\iway\IwayModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'iwayName' => 'IwayController',
    'iwayVersion' => '1.0',
    'status' => [
        '0' => IwayModule::t('IwayController', 'Tạm ngưng'),
        '1' => IwayModule::t('IwayController', 'Hiển thị'),
    ]
];
