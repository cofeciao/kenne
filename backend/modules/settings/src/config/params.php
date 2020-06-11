<?php
use modava\settings\SettingsModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'settingsName' => 'Settings',
    'settingsVersion' => '1.0',
    'status' => [
        '0' => SettingsModule::t('settings', 'Tạm ngưng'),
        '1' => SettingsModule::t('settings', 'Hiển thị'),
    ]
];
