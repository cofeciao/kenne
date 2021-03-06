<?php

use modava\auth\models\User;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use modava\customer\models\CustomerStatusCall;
use yii\widgets\DetailView;
use modava\customer\models\Customer;
use backend\widgets\ToastrWidget;
use modava\customer\widgets\NavbarWidgets;
use modava\customer\CustomerModule;
use modava\customer\models\table\CustomerTable;
use modava\customer\models\table\CustomerStatusCallTable;
use modava\customer\models\table\CustomerStatusDatHenTable;
use modava\customer\models\table\CustomerStatusDongYTable;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$status_call_dathen = ArrayHelper::map(CustomerStatusCall::getStatusCallDatHen(), 'id', 'id');
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
            <?php if (Yii::$app->user->can(User::DEV) ||
                Yii::$app->user->can('customer') ||
                Yii::$app->user->can('customerCustomer-orderCreate')) { ?>
                <?php if (in_array($model->scenario, [Customer::SCENARIO_CLINIC, Customer::SCENARIO_ADMIN]) && $model->statusDongYHasOne != null && $model->statusDongYHasOne->accept == CustomerStatusDongYTable::STATUS_PUBLISHED) { ?>
                    <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('backend', 'Order'), ['/customer/customer-order/create', 'customer_id' => $model->primaryKey], [
                        'class' => 'btn btn-success btn-sm'
                    ]) ?>
                <?php }
            } ?>
            <a class="btn btn-outline-light btn-sm" href="<?= Url::to(['create']); ?>"
               title="<?= Yii::t('backend', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= Yii::t('backend', 'Create'); ?></a>
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
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
                        'id',
                        'avatar',
                        'name',
                        'code',
                        'birthday:date',
                        [
                            'attribute' => 'sex',
                            'value' => function ($model) {
                                if ($model->sex === null || !array_key_exists($model->sex, CustomerTable::SEX)) return null;
                                return CustomerTable::SEX[$model->sex];
                            }
                        ],
                        [
                            'attribute' => 'phone',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->getPhone();
                            }
                        ],
                        [
                            'attribute' => 'address',
                            'value' => function ($model) {
                                return $model->getAddress();
                            }
                        ],
                        [
                            'attribute' => 'fanpage_id',
                            'visible' => $model->type === Customer::TYPE_ONLINE,
                            'value' => function ($model) {
                                if ($model->fanpageHasOne == null) return null;
                                return $model->fanpageHasOne->name;
                            }
                        ],
                        [
                            'attribute' => 'permission_user',
                            'value' => function ($model) {
                                if ($model->permissionUserHasOne == null || $model->permissionUserHasOne->userProfile == null) return null;
                                return $model->permissionUserHasOne->userProfile->fullname;
                            }
                        ],
                        [
                            'attribute' => 'type',
                            'value' => function ($model) {
                                if ($model->type === null || !array_key_exists($model->type, CustomerTable::TYPE)) return null;
                                return CustomerTable::TYPE[$model->type];
                            }
                        ],
                        [
                            'attribute' => 'status_call',
                            'visible' => $model->type == CustomerTable::TYPE_ONLINE,
                            'value' => function ($model) {
                                if ($model->statusCallHasOne == null) return null;
                                return $model->statusCallHasOne->name;
                            }
                        ],
                        [
                            'attribute' => 'remind_call_time',
                            'visible' => $model->type == Customer::TYPE_ONLINE && !in_array($model->status_call, $status_call_dathen) && $model->status_fail == null,
                            'value' => function ($model) {
                                if ($model->remind_call_time == null) return null;
                                return date('d-m-Y H:i', $model->remind_call_time);
                            }
                        ],
                        [
                            'attribute' => 'status_fail',
                            'visible' => $model->type == Customer::TYPE_ONLINE && $model->status_fail != null && $model->statusCallHasOne != null && $model->statusCallHasOne->accept == CustomerStatusCallTable::STATUS_DISABLED,
                            'value' => function ($model) {
                                if ($model->statusFailHasOne == null) return null;
                                return $model->statusFailHasOne->name;
                            }
                        ],
                        [
                            'attribute' => 'time_lich_hen',
                            'visible' => $model->type == CustomerTable::TYPE_ONLINE && $model->statusCallHasOne != null && $model->statusCallHasOne->accept == CustomerStatusCallTable::STATUS_PUBLISHED,
                            'value' => function ($model) {
                                if ($model->time_lich_hen == null) return null;
                                return date('d-m-Y H:i', $model->time_lich_hen);
                            }
                        ],
                        [
                            'attribute' => 'status_dat_hen',
                            'visible' => $model->type == CustomerTable::TYPE_ONLINE && in_array($model->status_call, $status_call_dathen) && $model->statusDatHenHasOne != null,
                            'value' => function ($model) {
                                if ($model->statusDatHenHasOne == null) return null;
                                return $model->statusDatHenHasOne->name;
                            }
                        ],
                        [
                            'attribute' => 'time_come',
                            'visible' => ($model->type == Customer::TYPE_ONLINE && $model->statusDatHenHasOne != null && $model->statusDatHenHasOne->accept == CustomerStatusDatHenTable::STATUS_PUBLISHED) || $model->type == Customer::TYPE_DIRECT,
                            'value' => function ($model) {
                                if ($model->time_come == null) return null;
                                return date('d-m-Y H:i', $model->time_come);
                            }
                        ],
                        [
                            'attribute' => 'status_dong_y',
                            'visible' => ($model->type == Customer::TYPE_ONLINE && $model->statusDatHenHasOne != null && $model->statusDatHenHasOne->accept == CustomerStatusDatHenTable::STATUS_PUBLISHED) || $model->type == Customer::TYPE_DIRECT,
                            'value' => function ($model) {
                                if ($model->statusDongYHasOne == null) return null;
                                return $model->statusDongYHasOne->name;
                            }
                        ],
                        [
                            'attribute' => 'status_dong_y_fail',
                            'visible' => $model->statusDongYHasOne != null && $model->statusDongYHasOne->accept == CustomerStatusDongYTable::STATUS_DISABLED,
                            'value' => function ($model) {
                                if ($model->statusDongYFailHasOne == null) return null;
                                return $model->statusDongYFailHasOne->name;
                            }
                        ],
                        [
                            'attribute' => 'co_so',
                            'visible' => $model->statusCallHasOne != null && $model->statusCallHasOne->accept == CustomerStatusCallTable::STATUS_PUBLISHED,
                            'value' => function ($model) {
                                if ($model->coSoHasOne == null) return null;
                                return $model->coSoHasOne->name;
                            }
                        ],
                        [
                            'attribute' => 'sale_online_note',
                            'visible' => $model->type === Customer::TYPE_ONLINE
                        ],
                        [
                            'attribute' => 'direct_sale_note',
                            'visible' => $model->type == CustomerTable::TYPE_DIRECT || ($model->type == CustomerTable::TYPE_ONLINE && $model->statusDatHenHasOne != null && $model->statusDatHenHasOne->accept == CustomerStatusDatHenTable::STATUS_PUBLISHED)
                        ],
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
