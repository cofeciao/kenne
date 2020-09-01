<?php
use yii\helpers\Url;
use modava\website\WebsiteModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-105">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'key-value') echo ' active' ?>"
           href="<?= Url::toRoute(['/website/key-value']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Key value'); ?>
        </a>
    </li>
</ul>
