<?php
use yii\helpers\Url;
use modava\comment\CommentModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'comment') echo ' active' ?>"
           href="<?= Url::toRoute(['/comment/comment']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Comment'); ?>
        </a>
    </li>
</ul>
