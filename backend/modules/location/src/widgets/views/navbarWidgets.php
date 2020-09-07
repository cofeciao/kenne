<?php
use yii\helpers\Url;
use modava\location\LocationModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-10">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'location-country') echo ' active' ?>"
           href="<?= Url::toRoute(['/location/location-country']); ?>">
            <i class="ion ion-ios-browsers"></i><?= Yii::t('backend', 'Country'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'location-province') echo ' active' ?>"
           href="<?= Url::toRoute(['/location/location-province']); ?>">
            <i class="ion ion-ios-boat"></i><?= Yii::t('backend', 'Province'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'location-district') echo ' active' ?>"
           href="<?= Url::toRoute(['/location/location-district']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'District'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'location-ward') echo ' active' ?>"
           href="<?= Url::toRoute(['/location/location-ward']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Ward'); ?>
        </a>
    </li>
</ul>
