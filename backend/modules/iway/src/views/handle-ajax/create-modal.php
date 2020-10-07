<?php

use modava\affiliate\AffiliateModule;

/* @var $modelName */
/* @var $formPath */
/* @var $model */
?>

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title"><?= Yii::t('backend', 'Create') . ' ' . Yii::t('backend', $modelName) ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="height: 60vh; overflow-y: scroll">
            <?= \Yii::$app->view->renderFile($formPath, ['model' => $model]); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>