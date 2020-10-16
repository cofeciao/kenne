<?php
use modava\test\TestModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'testName' => 'Test',
    'testVersion' => '1.0',
    'status' => [
        '0' => TestModule::t('test', 'Tạm ngưng'),
        '1' => TestModule::t('test', 'Hiển thị'),
    ]
];
