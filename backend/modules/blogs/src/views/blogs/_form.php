<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\blogs\BlogsModule;

/* @var $this yii\web\View */
/* @var $model modava\blogs\models\Blogs */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="blogs-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

		<?= $form->field($model, 'file')->fileInput() ?>

<!--            <div class="modal fade" id="modal-media-imge">-->
<!--                <div class="modal-dialog modal-lg">-->
<!--                    <div class="modal-content">-->
<!--                        <div class="modal-header">-->
<!--                            <h5 class="modal-title">Chọn Hình Ảnh</h5>-->
<!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                                <span aria-hidden="true">&times;</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="modal-body">-->
<!--                            <iframe src="--><!--./uploads" ></iframe>-->
<!--                        </div>-->
<!--                        <div class="modal-footer">-->
<!--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                            <button type="button" class="btn btn-primary">Save</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'descriptions')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList(
                [
                        0 => 'Không hoạt động',
                        1 => 'Hoạt Động'
                ],
                [
                        'prompt' => 'Status'
                ]
        ) ?>

		<?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'search')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'recent_post')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'tags')->dropDownList(
            [
                    'Shirt' => 'Shirt',
                    'Hoodie' => 'Hoodie',
                    'Jacket' => 'Jacket',
                    'Scarf' => 'Scarf',
                    'Frocks' => 'Frocks'
            ],
            [
                    'prompt' => 'Chọn Loại'
            ]
        ) ?>

        <div class="form-group">
            <?= Html::submitButton(BlogsModule::t('blogs', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
