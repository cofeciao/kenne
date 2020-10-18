<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\categories\widgets\NavbarWidgets;
use modava\categories\CategoriesModule;

/* @var $this yii\web\View */
/* @var $model modava\categories\models\Categories */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => CategoriesModule::t('categories', 'Categories'), 'url' => ['index']];
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
                title="<?= CategoriesModule::t('categories', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= CategoriesModule::t('categories', 'Create'); ?></a>
            <?= Html::a(CategoriesModule::t('categories', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CategoriesModule::t('categories', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CategoriesModule::t('categories', 'Are you sure you want to delete this item?'),
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
                            'attribute' => 'id',
                            'label' =>'ID'
                        ],
						'cat_name',
						'cat_status',
						'created_at',
						'updated_at',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => CategoriesModule::t('categories', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => CategoriesModule::t('categories', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
