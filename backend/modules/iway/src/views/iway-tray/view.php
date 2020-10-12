<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\models\IwayTray;

/* @var $this yii\web\View */
/* @var $model IwayTray */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Iway Trays'), 'url' => ['index']];
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
            <?php
            if ($model->status === IwayTray::GIAO_KHACH_HANG) {
                echo Html::a(Yii::t('backend', 'Hình ảnh'), ['/iway/iway-tray-image/view', 'id' => $model->primaryKey], [
                    'class' => 'btn btn-success btn-sm'
                ]);
            }
            ?>
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
                        'id',
                        'name',
                        'code',
                        'note:ntext',
                        'date_delivery',
                        'user_delivery',
                        'treatment_schedule_id',
                        'espect_date_begin',
                        'espect_date_end',
                        'date_begin',
                        'date_end',
                        [
                            'attribute' => 'result',
                            'value' => function ($model) {
                                if (!array_key_exists($model->result, IwayTray::RESULT)) return null;
                                return IwayTray::RESULT[$model->result];
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                if (!array_key_exists($model->status, IwayTray::STATUS)) return null;
                                return IwayTray::STATUS[$model->status];
                            }
                        ],
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
