<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use modava\iway\models\IwayTrayImages;

/* @var $this yii\web\View */
/* @var $model IwayTrayImages */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'id' => 'form-tray-image',
    'enableAjaxValidation' => true,
    'validationUrl' => Url::toRoute(['validate-upload', 'id' => $model->primaryKey]),
    'action' => Url::toRoute(['submit-upload', 'id' => $model->primaryKey])
]); ?>
    <div class="modal-body">
        <div class="tray-image-view tray-image-preview">
            <?php if ($model->primaryKey != null && $model->status != IwayTrayImages::CHUA_DANH_GIA) { ?>
                <div class="tray-image-evaluate">
                    <?php if ($model->status == IwayTrayImages::DAT) { ?>
                        <i class="fa fa-check"></i>
                    <?php } else if ($model->status == IwayTrayImages::CHUA_DAT) { ?>
                        <i class="fa fa-times"></i>
                    <?php } ?>
                </div>
            <?php } ?>
            <label class="upload-zone<?= $model->getImage() != null ? ' has-image' : '' ?><?= $model->primaryKey != null && in_array($model->status, [IwayTrayImages::CHUA_DANH_GIA, IwayTrayImages::DAT]) ? ' disabled' : '' ?>">
                <div class="preview">
                    <img src="<?= $model->getImage() ?>" alt="Preview">
                </div>
                <span class="refresh"><i class="fa fa-history"></i></span>
                <div class="upload">
                    <div class="icon-upload">
                        <i class="fa fa-upload"></i>
                    </div>
                    <div class="btn-upload">
                        <?= $form->field($model, 'fileImage')->fileInput([
                            'data-default' => $model->getImage(),
                            'onchange' => 'readURL(this, $(this).closest(".upload-zone").find(".preview"))'
                        ]) ?>
                    </div>
                </div>
            </label>
        </div>
        <?= $form->field($model, 'fileImageBase64', [
            'options' => [
                'tag' => false
            ]
        ])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'tray_id', [
            'options' => [
                'tag' => false
            ]
        ])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'type', [
            'options' => [
                'tag' => false
            ]
        ])->hiddenInput()->label(false) ?>
        <?php if ($model->primaryKey != null) { ?>
            <div class="evaluate">
                <?= $form->field($model, 'evaluate')->textarea() ?>
                <?php
                $status = IwayTrayImages::STATUS;
                unset($status[IwayTrayImages::CHUA_DANH_GIA]);
                echo $form->field($model, 'status')->radioList($status, []);
                ?>
            </div>
        <?php } ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary"
                data-dismiss="modal"><?= Yii::t('backend', 'Đóng') ?></button>
        <button type="button" class="btn btn-sm btn-success"
                id="btn-submit-tray-image"><?= Yii::t('backend', $model->primaryKey == null ? 'Save' : 'Update') ?></button>
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
function getFormData(form){
    var form_data = new FormData(form[0]);
    return form_data;
}
function getData(form){
    return {
        IwayTrayImages: {
            tray_id: $('input[name="IwayTrayImages[tray_id]"]').val() || null,
            type: $('input[name="IwayTrayImages[type]"]').val() || null,
            fileImageBase64: $('input[name="IwayTrayImages[fileImageBase64]"]').val() || null,
            evaluate: $('textarea[name="IwayTrayImages[evaluate]"]').val() || null,
            status: $('input[name="IwayTrayImages[status]"]:checked').val() || null,
        }
    };
}
form.on('beforeSubmit', function(e){
    e.preventDefault();
    var form_data = getData(form),
        url = form.attr('action');
    console.log(form_data);
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: form_data,
    }).done(res => {
        alert(res.msg);
        if(res.code === 200){
            $.pjax.reload({url: window.location.href, method: 'POST', container: '#pjax-tray-image'});
            $('#modal-image').modal('hide');
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