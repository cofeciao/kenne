<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\kenne\widgets\NavbarWidgets;
use modava\kenne\KenneModule;

/* @var $this yii\web\View */
/* @var $model modava\kenne\models\Subcribes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => KenneModule::t('kenne', 'Subcribes'), 'url' => ['index']];
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
            <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
                title="<?= KenneModule::t('kenne', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= KenneModule::t('kenne', 'Create'); ?></a>
            <?= Html::a(KenneModule::t('kenne', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(KenneModule::t('kenne', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => KenneModule::t('kenne', 'Are you sure you want to delete this item?'),
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
						'sub_email:email',
						'sub_status',
						'created_at',
						'updated_at',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => KenneModule::t('kenne', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => KenneModule::t('kenne', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
