<?php
use modava\kenne\KenneModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'kenneName' => 'Kenne',
    'kenneVersion' => '1.0',
    'status' => [
        '0' => KenneModule::t('kenne', 'Tạm ngưng'),
        '1' => KenneModule::t('kenne', 'Hiển thị'),
    ]
];
