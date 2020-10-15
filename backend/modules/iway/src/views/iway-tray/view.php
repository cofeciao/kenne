<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\models\IwayTray;
use modava\iway\models\IwayTrayImages;

/* @var $this yii\web\View */
/* @var $model IwayTray */
/* @var $tray_images array */

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
                echo Html::a(Yii::t('backend', 'Hình ảnh'), ['/iway/iway-tray-images/view', 'id' => $model->primaryKey], [
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
                        [
                            'attribute' => 'note',
                            'format' => 'raw'
                        ],
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
            <section class="hk-sec-wrapper">
                <h5>Tray in progress</h5>
                <div class="row">
                    <?php
                    $i = 0;
                    foreach (IwayTrayImages::TYPE as $key => $type) {
                        if ($i > 2) {
                            $i = 0;
                            echo '</div><div class="row">';
                        }
                        ?>
                        <div class="col-md-4 col-12">
                                <span class="tray-images<?= array_key_exists($key, $tray_images) && !in_array($tray_images[$key]->status, [IwayTrayImages::CHUA_DANH_GIA, IwayTrayImages::CHUA_DAT]) ? ' disabled' : '' ?>">
                                    <?php if (array_key_exists($key, $tray_images) && $tray_images[$key]->getImage() != null) { ?>
                                        <span class="preview tray-image-preview">
                                            <?php if ($tray_images[$key]->primaryKey != null && $tray_images[$key]->status != IwayTrayImages::CHUA_DANH_GIA) { ?>
                                                <div class="tray-image-evaluate">
                                                    <?php if ($tray_images[$key]->status == IwayTrayImages::DAT) { ?>
                                                        <i class="fa fa-check"></i>
                                                    <?php } else if ($tray_images[$key]->status == IwayTrayImages::CHUA_DAT) { ?>
                                                        <i class="fa fa-times"></i>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                            <img src="<?= $tray_images[$key]->getImage() ?>" alt="<?= $type ?>"
                                                 title="<?= $type ?>"/>
                                        </span>
                                    <?php } ?>
                                    <span><?= $type ?></span>
                                </span>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>
</div>
