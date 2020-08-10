<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \modava\affiliate\AffiliateModule;

/* @var $this yii\web\View */
/* @var $model modava\affiliate\models\search\FaqSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'title', [
                'template' => '
                <div class="input-group mb-3">
                    {input}
                    <div class="input-group-append">
                      ' . Html::submitButton(Yii::t('affiliate', 'Search'), ['class' => 'btn btn-success']) . '
                    </div>
                 </div>'
            ])->input('text', ['placeholder' => AffiliateModule::t('affiliate', 'Place a question...'),])->label(false) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
