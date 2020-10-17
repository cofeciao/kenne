<?php

use yii\helpers\Url;
use yii\helpers\Html;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\models\form\FormTrayImages;
use yii\widgets\Pjax;
use modava\iway\models\IwayTrayImages;

/* @var $this yii\web\View */
/* @var $tray IwayTrayImages */
/* @var $model FormTrayImages */
/* @var $tray_images array */

$this->title = 'Tray Images';
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Iway Tray Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="container-fluid px-xxl-25 px-xl-10">
        <?= NavbarWidgets::widget(); ?>

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                            class="ion ion-md-apps"></span></span><?= Yii::t('backend', 'Chi tiết'); ?>
                : <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5>Tray in progress</h5>
                    <?php Pjax::begin(['id' => 'pjax-tray-image', 'enablePushState' => false, 'clientOptions' => ['method' => 'GET']]) ?>
                    <div class="row">
                        <?php
                        $i = 0;
                        foreach (FormTrayImages::TYPE as $key => $type) {
                            if ($i > 2) {
                                $i = 0;
                                echo '</div><div class="row">';
                            }
                            ?>
                            <div class="col-md-4 col-12">
                                <span class="tray-images<?= array_key_exists($key, $tray_images) && !in_array($tray_images[$key]->status, [IwayTrayImages::CHUA_DANH_GIA, IwayTrayImages::CHUA_DAT]) ? ' disabled' : '' ?>"
                                      data-load="<?= Url::toRoute(['upload', 'parent_table' => 'tray_images', 'parent_id' => $tray->primaryKey, 'type' => $key, 'id' => (array_key_exists($key, $tray_images) ? $tray_images[$key]->id : null)]) ?>">
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
                    <?php Pjax::end() ?>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="modal-trap-images"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>