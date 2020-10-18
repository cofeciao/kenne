<?php
use yii\helpers\Url;
use modava\blogs\BlogsModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'blogs') echo ' active' ?>"
           href="<?= Url::toRoute(['/blogs/blogs']); ?>">
            <i class="ion ion-ios-locate"></i><?= BlogsModule::t('blogs', 'Blogs'); ?>
        </a>
    </li>
</ul>
