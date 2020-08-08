<?php
use yii\helpers\Url;
use modava\slide\SlideModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'slide') echo ' active' ?>"
           href="<?= Url::toRoute(['/slide/slide']); ?>">
            <i class="ion ion-ios-locate"></i><?= SlideModule::t('slide', 'Slide'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'slide-category') echo ' active' ?>"
           href="<?= Url::toRoute(['/slide/slide-category']); ?>">
            <i class="ion ion-ios-locate"></i><?= SlideModule::t('slide', 'Slide Category'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'slide-type') echo ' active' ?>"
           href="<?= Url::toRoute(['/slide/slide-type']); ?>">
            <i class="ion ion-ios-locate"></i><?= SlideModule::t('slide', 'Slide Type'); ?>
        </a>
    </li>
</ul>
