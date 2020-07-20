<?php
use yii\helpers\Url;
use modava\contact\ContactModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'contact') echo ' active' ?>"
           href="<?= Url::toRoute(['/contact/contact']); ?>">
            <i class="ion ion-ios-locate"></i><?= ContactModule::t('contact', 'Contact'); ?>
        </a>
    </li>
</ul>
