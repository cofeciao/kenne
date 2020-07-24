<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\blogs\widgets\NavbarWidgets;
use modava\blogs\BlogsModule;

/* @var $this yii\web\View */
/* @var $model modava\blogs\models\Blogs */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => BlogsModule::t('blogs', 'Blogs'), 'url' => ['index']];
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
                title="<?= BlogsModule::t('blogs', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= BlogsModule::t('blogs', 'Create'); ?></a>
            <?= Html::a(BlogsModule::t('blogs', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(BlogsModule::t('blogs', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => BlogsModule::t('blogs', 'Are you sure you want to delete this item?'),
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
						'image',
						'title',
						'descriptions',
						'date',
						'comments',
						'search',
						'recent_post',
						'tags',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => BlogsModule::t('blogs', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => BlogsModule::t('blogs', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
