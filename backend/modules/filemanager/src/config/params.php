<?php
use modava\filemanager\FilemanagerModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'filemanagerName' => 'Filemanager',
    'filemanagerVersion' => '1.0',
    'status' => [
        '0' => FilemanagerModule::t('filemanager', 'Tạm ngưng'),
        '1' => FilemanagerModule::t('filemanager', 'Hiển thị'),
    ]
];
