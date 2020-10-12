<?php

use yii\helpers\Url;
use yii\helpers\Html;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\models\form\FormTrayImages;
use yii\widgets\Pjax;
use modava\iway\models\IwayTrayImages;

/* @var $this yii\web\View */
/* @var $tray IwayTrayImages */
/* @var $model FormTrayImages */
/* @var $tray_images array */

$this->title = 'Tray Images';
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Iway Tray Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$css = <<< CSS
.tray-images {
    display: block;
    align-items: center;
    justify-content: center;
    border: solid 1px #ccc;
    margin-bottom: 10px;
    padding-bottom: 100%;
    height: 0;
    position: relative;
}
.tray-images > span {
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    align-items: center;
    justify-content: center;
    text-align: center;
    cursor: pointer;
    transition: all .2s ease-in-out;
    color: #000;
}
.tray-images > span.preview img {
    max-width: 98%;
    max-height: 98%;
}
.tray-images > span.preview + span {
    top: unset;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgb(255 255 255 / 0.7);
    box-shadow: unset;
    line-height: 40px;
}
.tray-images > span:hover {
    box-shadow: 1px 1px 4px #666;
}
.tray-images > span.preview + span:hover {
    opacity: 1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    box-shadow: none;
    background: rgb(255 255 255 / .7);
}
/* UPLOAD ZONE */
.upload-zone {
    width: 100%;
    position: relative;
    height: 0;
    padding-bottom: 64%;
    cursor: pointer;
    margin: 0;
}
.upload-zone .preview {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.upload-zone.has-image .preview {
    border: solid 2px #ccc;
}
.upload-zone .preview,
.upload-zone.has-image:not(.disabled):hover .preview {
    border: dashed 2px #ccc;
}
.upload-zone .preview img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 5px;
}
.upload-zone .preview img,
.upload-zone.has-image > .upload {
    opacity: 0;
}
.upload-zone.has-image .preview img,
.upload-zone.has-image:not(.disabled):hover > .upload {
    opacity: 1;
}
.upload-zone > .upload {
    position: absolute;
    top: 2px;
    left: 2px;
    right: 2px;
    bottom: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgb(255 255 255 / 0.7);
    transition: all 0.3s ease-in-out;
}
.upload-zone > .upload .btn-upload {
    display: none;
}
.upload-zone > .upload .icon-upload i {
    font-size: 2em;
    color: #999;
}
.upload-zone:hover > .upload .icon-upload i {
    color: #333;
}
/* UPLOAD ZONE */
CSS;
$this->registerCss($css);
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
                    <?php Pjax::begin(['id' => 'pjax-tray-image', 'enablePushState' => false, 'clientOptions' => ['method' => 'GET']]) ?>
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
                                <span class="tray-images<?= array_key_exists($key, $tray_images) && !in_array($tray_images[$key]->status, [IwayTrayImages::CHUA_DANH_GIA, IwayTrayImages::CHUA_DAT]) ? ' disabled' : '' ?>" data-image="<?= $key ?>" data-title="<?= $type ?>">
                                    <?php if (array_key_exists($key, $tray_images) && $tray_images[$key]->getImage() != null) { ?>
                                        <span class="preview">
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
$url_tray_images = Url::toRoute(['upload', 'id' => $tray->id, 'image' => '']);
$script = <<< JS
function previewImage(preview, src){
    console.log(preview);
    if(!preview.is('img')){
        console.log('a');
        var img = preview.children('img');
        if(img.length <= 0) preview.html('<img src="" alt="Preview"/>');
        preview = preview.children('img');
    }
    console.log(preview);
    preview.attr('src', src);
}
function readURL(input, preview) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            previewImage(preview, e.target.result);
            $(input).closest('.upload-zone').addClass('has-image');
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        var img_default = input.attr('data-default') || null;
        previewImage(preview, img_default);
        $(input).closest('.upload-zone').removeClass('has-image');
    }
}
$('body').on('click', '.tray-images', function(){
    var tray_image = $(this),
        data_image = tray_image.attr('data-image'),
        data_title = tray_image.attr('data-title');
    $('#modal-image #trap-image-title').html(data_title);
    $('#modal-image .modal-content').load('$url_tray_images'+ data_image);
    $('#modal-image').modal('show');
}).on('click', '.upload-zone.disabled', function(e){
    e.preventDefault();
    return false;
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);