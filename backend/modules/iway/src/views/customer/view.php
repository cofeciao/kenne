<?php

use backend\widgets\ToastrWidget;
use modava\iway\widgets\JsUtils;
use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Customer */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Customers'), 'url' => ['index']];
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
                        [
                            'label' => Yii::t('backend', 'Hành động'),
                            'format' => 'raw',
                            'value' => function ($model) {
                                /*
                                 * DropdownWidget::widget([
                                'title' => Yii::t('backend', 'Hành động'),
                                'isCustomItem' => true,
                                'options' => [
                                    'class' => 'btn-info btn-sm'
                                ],
                                'dropdowns' => [
                                    '{create-call}',
                                    '{create-lich-hen}',
                                    '{list-lich-hen}',
                                    '{list-call}',
                                    '{update}',
                                    '{delete}',
                                ]])
                                */
                                $buttons = Html::a('<i class="icon dripicons-phone"></i>' . ' ' . Yii::t('backend', 'Tạo cuộc gọi'), 'javascript:openCreateModal({model: "Call", "Call[customer_id]" : ' . $model->primaryKey . ',});', [
                                    'title' => Yii::t('backend', 'Tạo cuộc gọi'),
                                    'alia-label' => Yii::t('backend', 'Tạo cuộc gọi'),
                                    'data-pjax' => 0,
                                    'data-partner' => 'myaris',
                                    'class' => 'btn btn-success btn-xs create-call m-1'
                                ]);
                                $buttons .= Html::a('<i class="icon dripicons-to-do"></i>' . ' ' . Yii::t('backend', 'Tạo lịch hẹn'), 'javascript:openCreateModal({model: "AppointmentSchedule", "AppointmentSchedule[customer_id]" : ' . $model->primaryKey . ',
                                    });', [
                                    'title' => Yii::t('backend', 'Tạo lịch hẹn'),
                                    'alia-label' => Yii::t('backend', 'Tạo lịch hẹn'),
                                    'data-pjax' => 0,
                                    'data-partner' => 'myaris',
                                    'class' => 'btn btn-success btn-xs create-lich-hen m-1'
                                ]);
                                $buttons .= Html::a('<i class="icon dripicons-to-do"></i>' . ' ' . Yii::t('backend', 'DS Lịch hẹn'), Url::toRoute(['appointment-schedule/index', 'AppointmentScheduleSearch[customer_id]' => $model->primaryKey]), [
                                    'title' => Yii::t('backend', 'DS Lịch hẹn'),
                                    'alia-label' => Yii::t('backend', 'DS Lịch hẹn'),
                                    'data-pjax' => 0,
                                    'class' => 'btn btn-info btn-xs m-1',
                                    'target' => '_blank'
                                ]);
                                $buttons .= Html::a('<i class="icon dripicons-phone"></i>' . ' ' . Yii::t('backend', 'DS Cuộc gọi'), Url::toRoute(['call/index', 'CallSearch[customer_id]' => $model->primaryKey]), [
                                    'title' => Yii::t('backend', 'DS Cuộc gọi'),
                                    'alia-label' => Yii::t('backend', 'DS Cuộc gọi'),
                                    'data-pjax' => 0,
                                    'class' => 'btn btn-info btn-xs m-1',
                                    'target' => '_blank'
                                ]);
                                return $buttons;
                            },
                        ],
                        'fullname',
                        'code',
                        'avatar',
                        [
                            'attribute' => 'phone',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->getPhone();
                            }
                        ],
                        [
                            'attribute' => 'sex',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->sex, 'sex');
                            }
                        ],
                        'birthday:date',
                        'address',
                        [
                            'attribute' => 'province_id',
                            'value' => function ($model) {
                                return $model->province_id ? $model->province->name : null;
                            }
                        ],
                        [
                            'attribute' => 'district_id',
                            'value' => function ($model) {
                                return $model->district_id ? $model->district->name : null;
                            }
                        ],
                        [
                            'attribute' => 'ward_id',
                            'value' => function ($model) {
                                return $model->ward_id ? $model->ward->name : null;
                            }
                        ],
                        [
                            'attribute' => 'online_source',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->online_source, 'online_source');
                            }
                        ],
                        [
                            'attribute' => 'fb_fanpage',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->fb_fanpage, 'fb_fanpage');
                            }
                        ],
                        'fb_customer',
                        'online_sales_id',
                        'online_sales_note:raw',
                        [
                            'attribute' => 'status_customer',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->status_customer, 'status_customer');
                            }
                        ],
                        [
                            'attribute' => 'co_so_id',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->getDisplayRelatedField('co_so_id', 'coSo', 'co-so');
                            }
                        ],
                        [
                            'attribute' => 'reason_fail',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->reason_fail, 'reason_fail');
                            }
                        ],
                        [
                            'attribute' => 'who_created',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->who_created, 'who_created');
                            }
                        ],
                        'description:raw',
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
                    [
                        'attribute' => 'fb_fanpage',
                        'value' => function ($model) {
                            return $model->getDisplayDropdown($model->fb_fanpage, 'fb_fanpage');
                        }
                    ],
                    'fb_customer',
                    'online_sales_id',
                    'online_sales_note:raw',
                    [
                        'attribute' => 'status_customer',
                        'value' => function ($model) {
                            return $model->getDisplayDropdown($model->status_customer, 'status_customer');
                        }
                    ],
                    [
                        'attribute' => 'co_so_id',
                        'value' => function ($model) {
                            if ($model->coSo == null) return null;
                            return $model->coSo->title;
                        }
                    ],
                    [
                        'attribute' => 'reason_fail',
                        'value' => function ($model) {
                            return $model->getDisplayDropdown($model->reason_fail, 'reason_fail');
                        }
                    ],
                    [
                        'attribute' => 'who_created',
                        'value' => function ($model) {
                            return $model->getDisplayDropdown($model->who_created, 'who_created');
                        }
                    ],
                    'description:raw',
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
                ]) ?>
            </section>
        </div>
    </div>
</div>

<?= JsUtils::widget() ?>
