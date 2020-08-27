<?php

use yii\helpers\Url;
use modava\iway\IwayModule;

// Define route info
$routeInfos = [
    [
        'module' => 'iway',
        'controllerId' => 'iway',
        'label' => IwayModule::t('iway', 'Iway'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'customer',
        'label' => IwayModule::t('iway', 'Khách hàng'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'co-so',
        'label' => IwayModule::t('iway', 'Cơ sở'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'origin',
        'label' => IwayModule::t('iway', 'Origin'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'agency',
        'label' => IwayModule::t('iway', 'Agency'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'fanpage',
        'label' => IwayModule::t('iway', 'Fanpage'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'iway',
        'controllerId' => 'dropdowns-config',
        'label' => IwayModule::t('iway', 'Cấu hình dropdowns'),
        'icon' => '<i class="glyphicon glyphicon-cog"></i>',
    ],
];
?>

<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php foreach ($routeInfos as $routeInfo): ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == $routeInfo['controllerId']) echo ' active' ?>"
               href="<?= Url::toRoute(["/{$routeInfo['module']}/{$routeInfo['controllerId']}"]); ?>">
                <?= $routeInfo['icon'] . IwayModule::t($routeInfo['module'], $routeInfo['label']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>