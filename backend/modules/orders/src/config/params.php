<?php
use modava\orders\OrdersModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'ordersName' => 'Orders',
    'ordersVersion' => '1.0',
    'status' => [
        '0' => OrdersModule::t('orders', 'Tạm ngưng'),
        '1' => OrdersModule::t('orders', 'Hiển thị'),
    ]
];
