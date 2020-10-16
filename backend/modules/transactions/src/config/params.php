<?php
use modava\transactions\TransactionsModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'transactionsName' => 'Transactions',
    'transactionsVersion' => '1.0',
    'status' => [
        '0' => TransactionsModule::t('transactions', 'Tạm ngưng'),
        '1' => TransactionsModule::t('transactions', 'Hiển thị'),
    ]
];
