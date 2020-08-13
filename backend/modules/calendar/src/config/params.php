<?php
use modava\calendar\CalendarModule;

return [
    'calendarName' => 'Calendar',
    'calendarVersion' => '1.0',
    'status' => [
        '0' => CalendarModule::t('calendar', 'Tạm ngưng'),
        '1' => CalendarModule::t('calendar', 'Hiển thị'),
    ]
];
