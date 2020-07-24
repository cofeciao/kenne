<?php
use modava\affiliate\AffiliateModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'affiliateName' => 'Affiliate',
    'affiliateVersion' => '1.0',
    'status' => [
        '0' => AffiliateModule::t('affiliate', 'Tạm ngưng'),
        '1' => AffiliateModule::t('affiliate', 'Hiển thị'),
    ]
];
