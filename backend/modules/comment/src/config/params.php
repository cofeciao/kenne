<?php
use modava\comment\CommentModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'commentName' => 'Comment',
    'commentVersion' => '1.0',
    'status' => [
        '0' => CommentModule::t('comment', 'Tạm ngưng'),
        '1' => CommentModule::t('comment', 'Hiển thị'),
    ]
];
