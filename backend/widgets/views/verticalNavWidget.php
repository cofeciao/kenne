<?php

use yii\helpers\Url;
use modava\auth\models\User;

$is_dev = Yii::$app->user->can('develop');

?>

<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                    data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <div class="nav-header">
                <span>Dashboard</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item<?php if (Yii::$app->controller->id == 'site') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::home(); ?>">
                        <i class="ion ion-md-analytics"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>User Modules</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <?php if (Yii::$app->user->can(User::DEV) || Yii::$app->user->can('customer')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'customer') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/customer']); ?>">
                            <i class="ion ion-md-contacts"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Customer'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) || Yii::$app->user->can('product')) { ?>
                <li class="nav-item<?php if (Yii::$app->controller->module->id == 'product') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::toRoute(['/product']); ?>">
                        <i class="ion ion-md-cube"></i>
                        <span class="nav-link-text"><?= Yii::t('backend', 'Product'); ?></span>
                    </a>
                </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) || Yii::$app->user->can('article')) { ?>
                <li class="nav-item<?php if (Yii::$app->controller->module->id == 'article') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::toRoute(['/article']); ?>">
                        <i class="ion ion-ios-book"></i>
                        <span class="nav-link-text"><?= Yii::t('backend', 'Article'); ?></span>
                    </a>
                </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) || Yii::$app->user->can('location')) { ?>
                <li class="nav-item<?php if (Yii::$app->controller->module->id == 'location') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::toRoute(['/location/location-country']); ?>">
                        <i class="ion ion-md-map"></i>
                        <span class="nav-link-text"><?= Yii::t('backend', 'Location'); ?></span>
                    </a>
                </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) || Yii::$app->user->can('contact')) { ?>
                <li class="nav-item<?php if (Yii::$app->controller->module->id == 'contact') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::toRoute(['/contact']); ?>">
                        <i class="ion ion-md-contact"></i>
                        <span class="nav-link-text"><?= Yii::t('backend', 'Contact'); ?></span>
                    </a>
                </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) || Yii::$app->user->can('marketing')) { ?>
                <li class="nav-item<?php if (Yii::$app->controller->module->id == 'marketing') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::toRoute(['/marketing']); ?>">
                        <i class="ion ion-logo-markdown"></i>
                        <span class="nav-link-text"><?= Yii::t('backend', 'Marketing'); ?></span>
                    </a>
                </li>
                <?php } ?>
                <?php if ($is_dev || Yii::$app->user->can('authUser')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'auth') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/auth/user']); ?>">
                            <i class="ion icon-user"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'User'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) || Yii::$app->user->can('settings')) { ?>
                <li class="nav-item<?php if (Yii::$app->controller->module->id == 'settings') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::toRoute(['/settings']); ?>">
                        <i class="ion ion-ios-cog"></i>
                        <span class="nav-link-text"><?= Yii::t('backend', 'Settings'); ?></span>
                    </a>
                </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) || Yii::$app->user->can('website')) { ?>
                <li class="nav-item<?php if (Yii::$app->controller->module->id == 'website') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::toRoute(['/website']); ?>">
                        <i class="ion zmdi-directions-walk"></i>
                        <span class="nav-link-text"><?= Yii::t('backend', 'Website'); ?></span>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <hr class="nav-separator">
        </div>
    </div>
</nav>
<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>