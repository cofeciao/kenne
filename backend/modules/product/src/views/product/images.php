<?php

use yii\widgets\ActiveForm;
use Yii;
use yii\helpers\Html;
use modava\product\ProductModule;
use modava\tiny\components\FileManagerPermisstion;

$configPath = [
    'upload_dir' => '/uploads/filemanager/source/',
    'base_url' => \Yii::getAlias('@frontendUrl'),
    'FileManagerPermisstion' => FileManagerPermisstion::setPermissionFileAccess()
];
$filemanager_access_key = urlencode(serialize($configPath));
?>
<?php $form = ActiveForm::begin([]) ?>
<!-- Modal -->
<div class="modal fade" id="file-manager" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLarge01" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= Yii::t('backend', 'File Manager'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="<?= Yii::getAlias('@frontendUrl/') ?>/dialog.php?type=2&field_id=product-images&lang=vi&akey=<?= $filemanager_access_key; ?>"
                        style="width: 100%; height: 900px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal"><?= Yii::t('backend', 'Close'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>
