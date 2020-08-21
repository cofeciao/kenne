<?php
use modava\iway\IwayModule;

return [
    'iwayName' => 'Iway',
    'iwayVersion' => '1.0',
    'status' => [
        '0' => IwayModule::t('iway', 'Tạm ngưng'),
        '1' => IwayModule::t('iway', 'Hiển thị'),
    ]
];
