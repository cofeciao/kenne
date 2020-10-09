<?php

use modava\iway\models\Order;

return [
    'iwayName' => 'Iway',
    'iwayVersion' => '1.0',
    'status' => [
        '0' => Yii::t('backend', 'Tạm ngưng'),
        '1' => Yii::t('backend', 'Hiển thị'),
    ],
    'role_online_sales' => 'online_sales',
    'role_direct_sales' => 'direct_sales',
    'role_doctor_thamkham' => 'doctor_thamkham',
    'role_le_tan' => 'le_tan',
    'discount_type' => [
        Order::GIAM_GIA_TRUC_TIEP => '₫',
        Order::GIAM_GIA_PHAN_TRAM => '%',
    ]
];
