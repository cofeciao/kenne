<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use modava\iway\models\IwayImages;

/* @var $this yii\web\View */
/* @var $model IwayImages */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'id' => 'form-image',
    'enableAjaxValidation' => true,
    'validationUrl' => Url::toRoute(['validate-upload', 'id' => $model->primaryKey]),
    'action' => Url::toRoute(['submit-upload', 'id' => $model->primaryKey])
]); ?>
    <div class="modal-body">
        <div class="tray-image-view tray-image-preview">
            <?php if ($model->primaryKey != null && $model->status != IwayImages::CHUA_DANH_GIA) { ?>
                <div class="tray-image-evaluate">
                    <?php if ($model->status == IwayImages::DAT) { ?>
                        <i class="fa fa-check"></i>
                    <?php } else if ($model->status == IwayImages::CHUA_DAT) { ?>
                        <i class="fa fa-times"></i>
                    <?php } ?>
                </div>
            <?php } ?>
            <label class="upload-zone<?= $model->getImage() != null ? ' has-image' : '' ?><?= $model->primaryKey != null && in_array($model->status, [IwayImages::CHUA_DANH_GIA, IwayImages::DAT]) ? ' disabled' : '' ?>">
                <div class="preview">
                    <img src="<?= $model->getImage() ?>" alt="Preview">
                </div>
                <span class="refresh"><i class="fa fa-undo"></i></span>
                <div class="upload">
                    <div class="icon-upload">
                        <i class="fa fa-upload"></i>
                        <div>Click or drag picture here</div>
                    </div>
                    <div class="btn-upload">
                        <?= $form->field($model, 'fileImage', [
                            'options' => [
                                'tag' => false
                            ]
                        ])->fileInput([
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
        <?= $form->field($model, 'parent_table', [
            'options' => [
                'tag' => false
            ]
        ])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'parent_id', [
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
                $status = IwayImages::STATUS;
                unset($status[IwayImages::CHUA_DANH_GIA]);
                echo $form->field($model, 'status')->radioList($status, []);
                ?>
            </div>
        <?php } ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary"
                data-dismiss="modal"><?= Yii::t('backend', 'Đóng') ?></button>
        <button type="button" class="btn btn-sm btn-success"
                id="btn-submit-image"><?= Yii::t('backend', $model->primaryKey == null ? 'Save' : 'Update') ?></button>
    </div>
<?php ActiveForm::end(); ?>
<?php
$script = <<< JS
var form = $('#form-image'),
    btn_submit = $('#btn-submit-image');
btn_submit.on('click', function(){
    $(this).attr('disabled', 'disabled');
    form.submit();
});
function getFormData(form){
    return new FormData(form[0]);
}
function getData(form){
    return {
        IwayImages: {
            parent_id: $('input[name="IwayImages[parent_id]"]').val() || null,
            type: $('input[name="IwayImages[type]"]').val() || null,
            fileImageBase64: $('input[name="IwayImages[fileImageBase64]"]').val() || null,
            evaluate: $('textarea[name="IwayImages[evaluate]"]').val() || null,
            status: $('input[name="IwayImages[status]"]:checked').val() || null,
        }
    };
}
form.on('beforeSubmit', function(e){
    e.preventDefault();
    var form_data = getFormData(form),
        url = form.attr('action');
    console.log(form_data);
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: form_data,
        cache: false,
        processData: false,
        contentType: false
    }).done(res => {
        alert(res.msg);
        if(res.code === 200){
            if($('#pjax-images').length > 0) $.pjax.reload({url: window.location.href, method: 'POST', container: '#pjax-images'});
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