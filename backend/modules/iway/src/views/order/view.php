<?php

use backend\widgets\ToastrWidget;
use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Order */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Yii::t('backend', 'Chi tiết'); ?>
            : <?= Html::encode($this->title) ?>
        </h4>
        <p>
            <a class="btn btn-outline-light btn-sm" href="<?= Url::to(['create']); ?>"
               title="<?= Yii::t('backend', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= Yii::t('backend', 'Create'); ?></a>
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-sm',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
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
                        'title',
                        'code',
                        [
                            'attribute' => 'co_so_id',
                            'format' => 'raw',
                            'value' => function (modava\iway\models\Order $model) {
                                return Html::a($model->coSo->title, Url::toRoute(['co-so/view', 'id' => $model->co_so_id]));
                            }
                        ],
                        [
                            'attribute' => 'customer_id',
                            'format' => 'raw',
                            'value' => function (modava\iway\models\Order $model) {
                                return Html::a($model->customer->fullname, Url::toRoute(['co-so/view', 'id' => $model->customer_id]));
                            }
                        ],
                        'order_date:date',
                        [
                            'attribute' => 'status',
                            'value' => function (modava\iway\models\Order $model) {
                                return $model->getDisplayDropdown($model->status, 'status');
                            }
                        ],
                        [
                            'attribute' => 'payment_status',
                            'value' => function (modava\iway\models\Order $model) {
                                return $model->getDisplayDropdown($model->payment_status, 'payment_status');
                            }
                        ],
                        [
                            'attribute' => 'service_status',
                            'value' => function (modava\iway\models\Order $model) {
                                return $model->getDisplayDropdown($model->service_status, 'service_status');
                            }
                        ],
                        'total',
                        'discount',
                        'final_total',
                        'created_at:datetime',
                        'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => Yii::t('backend', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => Yii::t('backend', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
