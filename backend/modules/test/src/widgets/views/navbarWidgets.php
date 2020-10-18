<?php
use yii\helpers\Url;
use modava\test\TestModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'location-country') echo ' active' ?>"
           href="<?= Url::toRoute(['/test/location-country']); ?>">
            <i class="ion ion-ios-locate"></i><?= TestModule::t('test', 'Location Country'); ?>
        </a>
    </li>
</ul>
