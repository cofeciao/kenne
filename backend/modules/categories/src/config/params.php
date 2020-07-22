<?php
use modava\categories\CategoriesModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'categoriesName' => 'Categories',
    'categoriesVersion' => '1.0',
    'status' => [
        '0' => CategoriesModule::t('categories', 'Tạm ngưng'),
        '1' => CategoriesModule::t('categories', 'Hiển thị'),
    ]
];
