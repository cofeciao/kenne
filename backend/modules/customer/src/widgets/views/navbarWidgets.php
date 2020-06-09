<?php
use yii\helpers\Url;
use modava\customer\CustomerModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-fail') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer-status-fail']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Status Fail'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-dong-y') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer-status-dong-y']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Status Dong Y'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-dat-hen') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer-status-dat-hen']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Status Dat Hen'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-call') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer-status-call']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Status Call'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-type') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer-type']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Type'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-agency') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer-agency']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Agency'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-origin') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer-origin']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Origin'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-fanpage') echo ' active' ?>"
           href="<?= Url::toRoute(['/customer/customer-fanpage']); ?>">
            <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Fanpage'); ?>
        </a>
    </li>
</ul>
