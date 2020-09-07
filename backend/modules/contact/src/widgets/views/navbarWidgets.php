<?php
use yii\helpers\Url;
use modava\contact\ContactModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-10">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'contact') echo ' active' ?>"
           href="<?= Url::toRoute(['/contact/contact']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Contact'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'contact-category') echo ' active' ?>"
           href="<?= Url::toRoute(['/contact/contact-category']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Contact category'); ?>
        </a>
    </li>
</ul>
