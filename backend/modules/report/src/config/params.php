<?php
use modava\report\ReportModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'reportName' => 'Report',
    'reportVersion' => '1.0',
    'status' => [
        '0' => ReportModule::t('report', 'Tạm ngưng'),
        '1' => ReportModule::t('report', 'Hiển thị'),
    ]
];
