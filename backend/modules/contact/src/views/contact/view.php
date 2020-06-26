<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\contact\widgets\NavbarWidgets;
use modava\contact\ContactModule;

/* @var $this yii\web\View */
/* @var $model modava\contact\models\Contact */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => ContactModule::t('contact', 'Contact'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <p>
            <?= Html::a(ContactModule::t('contact', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => ContactModule::t('contact', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'fullname',
                        'phone',
                        'email:email',
                        'address',
                        'title',
                        'content:html',
                        'ip_address:ntext',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('contact')->params['status'][$model->status];
                            }
                        ],
                        'created_at:date',
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
