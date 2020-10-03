<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\IwayModule;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\DropdownsConfig */

$this->title = 'Table: ' . $model->table_name . ' - Field: ' . $model->field_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cấu hình dropdowns'), 'url' => ['index']];
$title = $this->title;
$this->params['breadcrumbs'][] = $title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($title) ?>
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

                <table class='table table-striped table-bordered'>
                    <tr>
                        <th><strong>Key</strong></th>
                        <th><strong>Value</strong></th>
                    </tr>
                    <?php foreach ($model->dropdown_value as $value): ?>
                        <tr>
                            <td><?= $value['key'] ?></td>
                            <td><?= $value['value'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </div>
    </div>
</div>
