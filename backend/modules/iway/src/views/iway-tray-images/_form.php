<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use modava\iway\models\IwayTrayImages;

/* @var $this yii\web\View */
/* @var $tray modava\iway\models\IwayTray */
/* @var $model modava\iway\models\form\FormTrayImages */
/* @var $form yii\widgets\ActiveForm */
/* @var $tray_image IwayTrayImages */
?>
<?php $form = ActiveForm::begin([
    'id' => 'form-tray-image',
    'enableAjaxValidation' => true,
    'validationUrl' => Url::toRoute(['validate-upload']),
    'action' => Url::toRoute(['submit-upload'])
]); ?>
    <div class="modal-body">
        <label class="upload-zone<?= $model->image != null ? ' has-image' : '' ?><?= $tray_image != null && in_array($tray_image->status, [IwayTrayImages::CHUA_DANH_GIA]) ? ' disabled' : '' ?>">
            <div class="preview">
                <img src="<?= $model->image ?>" alt="Preview">
            </div>
            <div class="upload">
                <div class="icon-upload">
                    <i class="fa fa-upload"></i>
                </div>
                <div class="btn-upload">
                    <?= $form->field($model, 'image')->fileInput([
                        'data-default' => $model->image,
                        'onchange' => 'readURL(this, $(this).closest(".upload-zone").find(".preview"))'
                    ]) ?>
                </div>
            </div>
        </label>
        <?= $form->field($model, 'tray', [
            'options' => [
                'tag' => false
            ]
        ])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'type', [
            'options' => [
                'tag' => false
            ]
        ])->hiddenInput()->label(false) ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <?php if ($tray_image == null || !in_array($tray_image->status, [IwayTrayImages::CHUA_DANH_GIA])) { ?>
            <button type="button" class="btn btn-sm btn-success"
                    id="btn-submit-tray-image"><?= Yii::t('backend', 'Save') ?></button>
        <?php } ?>
    </div>
<?php ActiveForm::end(); ?>
<?php
$script = <<< JS
var form = $('#form-tray-image'),
    btn_submit = $('#btn-submit-tray-image');
btn_submit.on('click', function(){
    $(this).attr('disabled', 'disabled');
    form.submit();
});
form.on('beforeSubmit', function(e){
    e.preventDefault();
    var form_data = new FormData(form[0]),
        url = form.attr('action');
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false
    }).done(res => {
        alert(res.msg);
        if(res.code === 200){
            $.pjax.reload({url: window.location.href, method: 'POST', container: '#pjax-tray-image'});
            $('#modal-image .modal-header .close').trigger('click');
        } else {
            btn_submit.removeAttr('disabled');
        }
    }).fail(f => {
        alert('Có lỗi xảy ra!');
        console.log('failed', f);
        btn_submit.removeAttr('disabled');
    });
    return false;
}).on('afterValidate', function (event, fields, errors) {
    if(Object.keys(errors).length > 0){
        btn_submit.removeAttr('disabled');
    }
});
JS;
$this->registerJs($script);