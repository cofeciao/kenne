<?php

use modava\customer\widgets\NavbarWidgets;
use yii\helpers\Html;

$this->title = 'iWay';
$this->title = Yii::t('backend', 'iWay');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
    </div>

    <div class="row top-header-content update-note">
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="card-title mt-0 font-16">Tên bệnh nhân</h5>
                    <div class="align-items-center">
                        <p class="text-primary">Nguyễn Thị Quỳnh Ngân test</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="card-title mt-0 font-16">Giới tính</h5>
                    <div class="align-items-center">
                        <p class="text-primary">Nữ</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="card-title mt-0 font-16">Số điện thoại</h5>
                    <div class="align-items-center">
                        <p class="text-primary">0988787985</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="card-title mt-0 font-16">Ngày sinh</h5>
                    <div class="align-items-center">
                        <p class="text-primary">1969-03-01</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <div class="row">

    </div>
</div>

