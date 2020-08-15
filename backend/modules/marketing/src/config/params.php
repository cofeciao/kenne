<?php
use modava\marketing\MarketingModule;

return [
    'marketingName' => 'Marketing',
    'marketingVersion' => '1.0',
    'status' => [
        '0' => MarketingModule::t('marketing', 'Tạm ngưng'),
        '1' => MarketingModule::t('marketing', 'Hiển thị'),
    ]
];
