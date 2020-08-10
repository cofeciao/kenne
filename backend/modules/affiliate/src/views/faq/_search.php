<?php

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
        <div class="col-3">
            <?= $form->field($model, 'title')->input('text', ['placeholder' => AffiliateModule::t('affiliate', 'Place a question...')])->label(false) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'short_content')->input('text', ['placeholder' => AffiliateModule::t('affiliate', 'Place a short answer...')])->label(false) ?>
        </div>
        <div class="col-1">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('affiliate', 'Search'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
