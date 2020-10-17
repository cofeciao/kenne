<?php

use yii\helpers\Url;
use yii\helpers\Html;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\models\form\FormTrayImages;
use yii\widgets\Pjax;
use modava\iway\models\IwayTrayImages;
use modava\iway\models\IwayTray;
use modava\iway\models\IwayImages;

/* @var $this yii\web\View */
/* @var $tray IwayTrayImages */
/* @var $model FormTrayImages */
/* @var $tray_images array */

$this->title = 'Tray Images';
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Iway Tray Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="container-fluid px-xxl-25 px-xl-10">
        <?= NavbarWidgets::widget(); ?>

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                            class="ion ion-md-apps"></span></span><?= Yii::t('backend', 'Chi tiết'); ?>
                : <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5>Tray in progress</h5>
                    <?php Pjax::begin(['id' => 'pjax-images', 'enablePushState' => false, 'clientOptions' => ['method' => 'GET']]) ?>
                    <div class="row">
                        <?php
                        $i = 0;
                        foreach (FormTrayImages::TYPE as $key => $type) {
                            if ($i > 2) {
                                $i = 0;
                                echo '</div><div class="row">';
                            }
                            ?>
                            <div class="col-md-4 col-12">
                                <span class="tray-images<?= array_key_exists($key, $tray_images) && !in_array($tray_images[$key]->status, [IwayTrayImages::CHUA_DANH_GIA, IwayTrayImages::CHUA_DAT]) ? ' disabled' : '' ?>"
                                      data-load="<?= Url::toRoute(['upload', 'parent_table' => IwayTray::tableName(), 'parent_id' => $tray->primaryKey, 'type' => $key, 'id' => (array_key_exists($key, $tray_images) ? $tray_images[$key]->id : null)]) ?>">
                                    <?php if (array_key_exists($key, $tray_images) && $tray_images[$key]->getImage() != null) { ?>
                                        <span class="preview tray-image-preview">
                                            <?php if ($tray_images[$key]->primaryKey != null && $tray_images[$key]->status != IwayTrayImages::CHUA_DANH_GIA) { ?>
                                                <div class="tray-image-evaluate">
                                                    <?php if ($tray_images[$key]->status == IwayTrayImages::DAT) { ?>
                                                        <i class="fa fa-check"></i>
                                                    <?php } else if ($tray_images[$key]->status == IwayTrayImages::CHUA_DAT) { ?>
                                                        <i class="fa fa-times"></i>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                            <img src="<?= $tray_images[$key]->getImage() ?>" alt="<?= $type ?>"
                                                 title="<?= $type ?>"/>
                                        </span>
                                    <?php } ?>
                                    <span><?= $type ?></span>
                                </span>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                    <?php Pjax::end() ?>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="modal-trap-images"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
<?php
$script = <<< JS
function previewImage(preview, src){
    if(!preview.is('img')){
        var img = preview.children('img');
        if(img.length <= 0) preview.html('<img src="" alt="Preview"/>');
        preview = preview.children('img');
    }
    preview.attr('src', src);
}
function readURL(input, preview) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            previewImage(preview, e.target.result);
            $('input[name="IwayTrayImages[fileImageBase64]"]').val(e.target.result);
            $(input).closest('.upload-zone').addClass('has-image').closest('.modal-body').addClass('change-image');
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        var img_default = $(input).attr('data-default') || null;
        previewImage(preview, img_default);
        if(img_default == null) {
            $(input).closest('.upload-zone').removeClass('has-image');
        }
        $('input[name="IwayTrayImages[fileImageBase64]"]').val(null);
        $(input).closest('.modal-body').removeClass('change-image');
    }
}
$('body').on('click', '.tray-images', function(){
    var tray_image = $(this),
        url = tray_image.attr('data-load');
    $('#modal-image .modal-content').load(url);
    $('#modal-image').modal('show');
}).on('click', '.upload-zone.disabled', function(e){
    e.preventDefault();
    return false;
}).on('click', '.upload-zone .refresh', function(){
    $(this).closest('.upload-zone').find('.btn-upload input[type="file"]').val('').trigger('change');
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);