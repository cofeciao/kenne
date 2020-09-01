<?php

use modava\customer\CustomerModule;
use modava\customer\models\CustomerStatusDongY;
use modava\customer\models\CustomerStatusDatHen;
use modava\customer\models\CustomerStatusCall;
use modava\customer\models\Customer;

return [
    'customerName' => 'Customer',
    'customerVersion' => '1.0',
    'sex' => [
        Customer::SEX_WOMEN => Yii::t('backend', 'Nữ'),
        Customer::SEX_MEN => Yii::t('backend', 'Nam'),
    ],
    'status' => [
        '0' => Yii::t('backend', 'Tạm ngưng'),
        '1' => Yii::t('backend', 'Hiển thị'),
    ],
    'statusOrder' => [
        CustomerStatusDongY::STATUS_DISABLED => Yii::t('backend', 'Chưa hoàn thành'),
        CustomerStatusDongY::STATUS_PUBLISHED => Yii::t('backend', 'Đã hoàn thành'),
    ],
    'acceptDongY' => [
        CustomerStatusDongY::STATUS_DISABLED => Yii::t('backend', 'Không đồng ý'),
        CustomerStatusDongY::STATUS_PUBLISHED => Yii::t('backend', 'Đồng ý'),
    ],
    'acceptDatHen' => [
        CustomerStatusDatHen::STATUS_DISABLED => Yii::t('backend', 'Đặt hẹn không đến'),
        CustomerStatusDatHen::STATUS_PUBLISHED => Yii::t('backend', 'Đặt hẹn đến'),
    ],
    'acceptCall' => [
        CustomerStatusCall::STATUS_DISABLED => Yii::t('backend', 'Không đặt hẹn'),
        CustomerStatusCall::STATUS_PUBLISHED => Yii::t('backend', 'Đặt hẹn'),
    ]
];
