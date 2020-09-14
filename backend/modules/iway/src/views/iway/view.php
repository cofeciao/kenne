<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 9/8/2020
 * Time: 08:58
 */

use yii\helpers\Html;

$this->title = 'iWay';
$this->title = Yii::t('backend', 'iWay');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('http://admin.iway.paditech.org/iway/assets/css/lightslider.css');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card mb-30">
                <div class="card-header"></div>
                <div class="card-content">
                    <ul class="nav nav-pills justify-content-center custom-tab-button my-3">
                        <li class="nav-item">
                            <a class="nav-link" id="pills-1-tab-button" data-toggle="pill" href="#pills-1-button"
                               role="tab" aria-controls="pills-1-button" aria-selected="true"><span
                                        class="tab-btn-icon"><i class="feather icon-book-open"></i></span>Hồ sơ khám
                                bệnh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-2-tab-button" data-toggle="pill"
                               href="#pills-2-button" role="tab" aria-controls="pills-2-button"
                               aria-selected="false"><span class="tab-btn-icon"><i
                                            class="feather icon-book-open"></i></span>Hồ sơ thiết kế</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-3-tab-button" data-toggle="pill" href="#pills-3-button"
                               role="tab" aria-controls="pills-3-button" aria-selected="false"><span
                                        class="tab-btn-icon"><i class="feather icon-calendar"></i></span>Lịch điều
                                trị</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-4-tab-button" data-toggle="pill" href="#pills-4-button"
                               role="tab" aria-controls="pills-4-button" aria-selected="false"><span
                                        class="tab-btn-icon"><i class="feather icon-airplay"></i></span>Ảnh thay
                                khay</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-5-tab-button" data-toggle="pill" href="#pills-5-button"
                               role="tab" aria-controls="pills-5-button" aria-selected="false"><span
                                        class="tab-btn-icon"><i class="feather icon-dollar-sign"></i></span>Thanh
                                Toán</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent-button">
                        <div class="tab-pane fade" id="pills-1-button" role="tabpanel"
                             aria-labelledby="pills-1-tab-button">
                            <div class="card-body">
                                <?= $this->render('_ho-so-kham-benh') ?>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="pills-2-button" role="tabpanel"
                             aria-labelledby="pills-2-tab-button">
                            <div class="card-body">
                                <?= $this->render('_ho-so-thiet-ke') ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-3-button" role="tabpanel"
                             aria-labelledby="pills-3-tab-button">
                            <div class="card-body">
                                <?= $this->render('_lich-dieu-tri') ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-4-button" role="tabpanel"
                             aria-labelledby="pills-4-tab-button">
                            <div class="card-body">
                                <?= $this->render('_anh-thay-khay') ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-5-button" role="tabpanel"
                             aria-labelledby="pills-5-tab-button">
                            <div class="card-body">
                                <?= $this->render('_thanh-toan') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerCssFile(Yii::$app->assetManager->publish('@backendWeb/call-center/css/main.css')[1], ['depends' => \yii\bootstrap\BootstrapAsset::class]);
$this->registerJsFile('http://admin.iway.paditech.org/iway/assets/js/lightslider.js', ['depends' => \backend\assets\AppAsset::class]);
?>
