<?php

use yii\helpers\Url;
use modava\customer\CustomerModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item dropdown mb-5<?= in_array(Yii::$app->controller->id, ['customer']) ? ' show' : '' ?>">
        <a href="#" class="nav-link link-icon-left dropdown-toggle" data-toggle="dropdown" role="button"
           aria-haspopup="true" aria-expanded="false">
            <i class="ion icon-user"></i><?= CustomerModule::t('customer', 'Customer'); ?>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= Url::toRoute(['/customer/customer']); ?>">
                <?= CustomerModule::t('customer', 'Customer'); ?>
            </a>
        </div>
    </li>
    <li class="nav-item dropdown mb-5<?= in_array(Yii::$app->controller->id, [
        'customer-status-fail',
        'customer-status-dat-hen',
        'customer-status-call',
        'customer-type',
        'customer-agency',
        'customer-origin',
        'customer-fanpage',
    ]) ? ' show' : '' ?>">
        <a href="#" class="nav-link link-icon-left dropdown-toggle" data-toggle="dropdown" role="button"
           aria-haspopup="true" aria-expanded="false">
            <i class="ion icon-ios-cog"></i><?= CustomerModule::t('customer', 'Customer Config'); ?>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= Url::toRoute(['/customer/customer-status-fail']); ?>">
                <?= CustomerModule::t('customer', 'Customer Status Fail'); ?>
            </a>
            <a class="dropdown-item" href="<?= Url::toRoute(['/customer/customer-status-dat-hen']); ?>">
                <?= CustomerModule::t('customer', 'Customer Status Dat Hen'); ?>
            </a>
            <a class="dropdown-item" href="<?= Url::toRoute(['/customer/customer-status-call']); ?>">
                <?= CustomerModule::t('customer', 'Customer Status Call'); ?>
            </a>
            <a class="dropdown-item" href="<?= Url::toRoute(['/customer/customer-type']); ?>">
                <?= CustomerModule::t('customer', 'Customer Type'); ?>
            </a>
            <a class="dropdown-item" href="<?= Url::toRoute(['/customer/customer-agency']); ?>">
                <?= CustomerModule::t('customer', 'Customer Agency'); ?>
            </a>
            <a class="dropdown-item" href="<?= Url::toRoute(['/customer/customer-origin']); ?>">
                <?= CustomerModule::t('customer', 'Customer Origin'); ?>
            </a>
            <a class="dropdown-item" href="<?= Url::toRoute(['/customer/customer-fanpage']); ?>">
                <?= CustomerModule::t('customer', 'Customer Fanpage'); ?>
            </a>
        </div>
    </li>
</ul>