<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\iway\widgets\NavbarWidgets;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\AppointmentSchedule */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Appointment Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?=Yii::t('backend', 'Chi tiết'); ?>: <?= Html::encode($this->title) ?>
        </h4>
        <p>
            <a class="btn btn-sm btn-outline-light" href="<?= Url::to(['create']); ?>"
                title="<?= Yii::t('backend', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= Yii::t('backend', 'Create'); ?></a>
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-danger',
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
                        [
                            'attribute' => 'customer_id',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->getDisplayRelatedField('customer_id', 'customer', 'customer', 'fullname');
                            }
                        ],
                        [
                            'attribute' => 'co_so_id',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->getDisplayRelatedField('co_so_id', 'coSo', 'co-so');
                            }
                        ],
						'start_time:datetime',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->status, 'status');
                            }
                        ],
                        [
                            'attribute' => 'new_appointment_schedule_id',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (!$model->new_appointment_schedule_id) return null;

                                return Html::a($model->newAppointmentSchedule->title, ['view', 'id' => $model->new_appointment_schedule_id], [
                                    'title' => $model->newAppointmentSchedule->title,
                                    'data-pjax' => 0,
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'status_service',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->status_service, 'status_service');
                            }
                        ],
                        [
                            'attribute' => 'accept_for_service',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->accept_for_service, 'accept_for_service');
                            }
                        ],
                        [
                            'attribute' => 'reason_fail',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->reason_fail, 'reason_fail');
                            }
                        ],
                        'description:raw',
						'check_in_time:datetime',
                        [
                            'attribute' => 'direct_sales_id',
                            'value' => function ($model) {
                                return $model->direct_sales_id ? $model->directSales->userProfile->fullname : '';
                            }
                        ],
                        'direct_sales_note:raw',
                        [
                            'attribute' => 'doctor_thamkham_id',
                            'value' => function ($model) {
                                return $model->doctor_thamkham_id ? $model->doctorThamkham->userProfile->fullname : '';
                            }
                        ],
                        'doctor_thamkham_note:raw',
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