<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin([]) ?>
<?= Html::button('<i class="fa fa-upload"></i> Upload', [
    'class' => 'btn btn-primary btn-choose-images w-100'
]) ?>
<?php ActiveForm::end() ?>
