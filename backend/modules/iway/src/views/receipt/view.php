<?php

use backend\widgets\ToastrWidget;
use modava\iway\helpers\Utils;
use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Receipt */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Receipts'), 'url' => ['index']];
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
                        'title',
                        [
                            'attribute' => 'order_id',
                            'format' => 'raw',
                            'value' => function (\modava\iway\models\Receipt $model) {
                                return $model->getDisplayRelatedField('order_id', 'order', 'order');
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function (modava\iway\models\Receipt $model) {
                                $class = '';
                                switch ($model->status) {
                                    case 'nhap':
                                        $class = 'badge-light';
                                        break ;
                                    case 'da_thu':
                                        $class = 'badge-success';
                                        break ;
                                    case 'hoan_coc':
                                        $class = 'badge-secondary';
                                        break ;
                                };
                                return Html::tag('span', $model->getDisplayDropdown($model->status, 'status'), [
                                        'class' => 'font-14 badge ' . $class
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'receipt_date',
                            'value' => function (modava\iway\models\Receipt $model) {
                                return Utils::convertDateTimeToDisplayFormat($model->receipt_date);
                            }
                        ],
                        'amount:currency',
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
    </div>
</div>
