<?php
use yii\helpers\Url;
use modava\transactions\TransactionsModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'transactions') echo ' active' ?>"
           href="<?= Url::toRoute(['/transactions/transactions']); ?>">
            <i class="ion ion-ios-locate"></i><?= TransactionsModule::t('transactions', 'Transactions'); ?>
        </a>
    </li>
</ul>
