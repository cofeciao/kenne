<?php
use modava\products\ProductsModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'productsName' => 'Products',
    'productsVersion' => '1.0',
    'status' => [
        '0' => ProductsModule::t('products', 'Tạm ngưng'),
        '1' => ProductsModule::t('products', 'Hiển thị'),
    ]
];
