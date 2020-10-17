<?php

use yii\helpers\Url;

// Define route info
$routeInfos = [
    [
        'module' => 'iway',
        'controllerId' => 'iway',
        'label' => Yii::t('backend', 'Iway'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'customer',
        'label' => Yii::t('backend', 'Khách hàng'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'call',
        'label' => Yii::t('backend', 'Cuộc gọi'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'appointment-schedule',
        'label' => Yii::t('backend', 'Lịch hẹn'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'order',
        'label' => Yii::t('backend', 'Đơn hàng'),
        'icon' => '<i class="glyphicon glyphicon-cog"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'receipt',
        'label' => Yii::t('backend', 'Phiếu thu'),
        'icon' => '<i class="glyphicon glyphicon-cog"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'treatment-schedule',
        'label' => Yii::t('backend', 'Liệu trình điều trị'),
        'icon' => '<i class="glyphicon glyphicon-cog"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'co-so',
        'label' => Yii::t('backend', 'Cơ sở'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'dropdowns-config',
        'label' => Yii::t('backend', 'Cấu hình dropdowns'),
        'icon' => '<i class="glyphicon glyphicon-cog"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'iway/doctor-view',
        'label' => Yii::t('backend', 'View doctor'),
        'icon' => '<i class="glyphicon glyphicon-cog"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'iway-tray',
        'label' => Yii::t('backend', 'Tray'),
        'icon' => '<i class="glyphicon glyphicon-cog"></i>',
    ],
];
?>

<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php foreach ($routeInfos as $routeInfo): ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == $routeInfo['controllerId']) echo ' active' ?>"
               href="<?= Url::toRoute(["/{$routeInfo['module']}/{$routeInfo['controllerId']}"]); ?>">
                <?= $routeInfo['icon'] . Yii::t('backend', $routeInfo['label']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>