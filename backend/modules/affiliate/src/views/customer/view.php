<?php

use modava\affiliate\helpers\Utils;
use modava\affiliate\models\Coupon;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\affiliate\widgets\NavbarWidgets;
use modava\affiliate\AffiliateModule;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model modava\affiliate\models\Customer */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$dataProvider = new ActiveDataProvider([
    'query' => Coupon::find()->where('customer_id = :customer_id', [':customer_id' => $model->primaryKey]),
    'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
]);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
    <div class="container-fluid px-xxl-25 px-xl-10">
        <?= NavbarWidgets::widget(); ?>

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="ion ion-md-apps"></span>
                </span>
                <?= Html::encode($this->title) ?>
            </h4>
            <p>
                <button class="btn btn-primary js-more-info btn-sm" data-customer-id="<?= $model->partner_customer_id ?>"><?= Yii::t('backend', 'More Information') ?></button>
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

                <nav>
                    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tong-quan" role="tab" aria-controls="nav-home" aria-selected="true">
                            Chi tiết
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#chi-tiet" role="tab" aria-controls="nav-profile" aria-selected="false">Tổng quan</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="tong-quan" role="tabpanel" aria-labelledby="nav-home-tab">
                        <section class="hk-sec-wrapper">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'label' => Yii::t('backend', 'Related Record'),
                                        'format' => 'raw',
                                        'value' => function ($model) {
                                            $listButton = '';

                                            if (Utils::isReleaseObject('Coupon')) {
                                                $count = count($model->coupons);

                                                $bage = $count ? '<span class="badge badge-light ml-1">' . $count . '</span>' : '';

                                                $listButton .= Html::a('<i class="icon dripicons-ticket"></i> ' . $bage, Url::toRoute(['/affiliate/coupon', 'CouponSearch[customer_id]' => $model->primaryKey]), [
                                                    'title' => Yii::t('backend', 'List Tickets'),
                                                    'alia-label' => Yii::t('backend', 'List Tickets'),
                                                    'data-pjax' => 0,
                                                    'class' => 'btn btn-info btn-xs list-relate-record m-1',
                                                    'data-related-id' => $model->primaryKey,
                                                    'data-related-field' => 'customer_id',
                                                    'data-model' => 'Coupon',
                                                    'target' => '_blank'
                                                ]);
                                            }

                                            if (Utils::isReleaseObject('Note')) {
                                                $count = count($model->notes);

                                                $bage = $count ? '<span class="badge badge-light ml-1">' . $count . '</span>' : '';

                                                $listButton .= Html::a('<i class="icon dripicons-to-do"></i>' . $bage, Url::toRoute(['/affiliate/note', 'NoteSearch[customer_id]' => $model->primaryKey]), [
                                                    'title' => Yii::t('backend', 'List Notes'),
                                                    'alia-label' => Yii::t('backend', 'List Notes'),
                                                    'data-pjax' => 0,
                                                    'class' => 'btn btn-success btn-xs list-relate-record m-1',
                                                    'data-related-id' => $model->primaryKey,
                                                    'data-related-field' => 'customer_id',
                                                    'data-model' => 'Note',
                                                    'target' => '_blank'
                                                ]);
                                            }

                                            return $listButton;
                                        },
                                    ],
                                    'id',
                                    'slug',
                                    'full_name',
                                    'phone',
                                    'email:email',
                                    'face_customer',
                                    'birthday:date',
                                    [
                                        'attribute' => 'sex',
                                        'value' => function ($model) {
                                            return Yii::$app->getModule('affiliate')->params['sex'][$model->sex];
                                        }
                                    ],
                                    [
                                        'attribute' => 'status',
                                        'headerOptions' => [
                                            'class' => 'header-100',
                                        ],
                                        'value' => function ($model) {
                                            return Yii::$app->getModule('affiliate')->params['customer_status'][$model->status];
                                        }
                                    ],
                                    'date_accept_do_service:date',
                                    'date_checkin:date',
                                    'total_commission:currency',
                                    'total_commission_paid:currency',
                                    'total_commission_remain:currency',
                                    [
                                        'attribute' => 'country_id',
                                        'value' => function ($model) {
                                            return $model->country_id ? $model->country->CommonName : null;
                                        }
                                    ],
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
                                        'attribute' => 'partner_id',
                                        'format' => 'raw',
                                        'value' => function ($model) {
                                            return $model->partner_id ? Html::a($model->partner->title, Url::toRoute(['/affiliate/partner/view', 'id' => $model->partner_id])) : '';
                                        }
                                    ],
                                    'address:raw',
                                    'bank_name',
                                    'bank_branch',
                                    'bank_customer_id',
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
                            ]) ?>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="chi-tiet" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="hk-sec-wrapper">
                            Tổng quan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$controllerURL = Url::toRoute(["/affiliate/handle-ajax"]);

$script = <<< JS
function showMoreInfoCustomer(customerId) {
        let modalHTML = `<div class="modal fade ModalContainer" tabindex="-1" role="dialog" aria-labelledby="ModalContainer" aria-hidden="true"></div>`;

        if ($('.ModalContainer').length) $('.ModalContainer').remove();

        $('body').append(modalHTML);
        
    $.get('$controllerURL/get-customer-more-info', {customerId, model: 'Customer'}, function(data, status, xhr) {
        if (status === 'success') {
            $('.ModalContainer').html(data);
            $('.ModalContainer').modal();
            $('.customer-img-container').lightGallery();
        }
    });
}

$('.js-more-info').on('click', function() {
    showMoreInfoCustomer($(this).data('customer-id'));
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
