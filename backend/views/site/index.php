<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 12-Dec-18
 * Time: 4:24 PM
 */

use yii\helpers\Url;

use modava\chart\PieChart;
use modava\chart\MiniList;
use modava\chart\BarChart;
use modava\affiliate\AffiliateModule;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid mt-xl-50- mt-sm-30- mt-10 px-xxl-65- px-xl-15">
    <ul class="nav nav-tabs nav-sm nav-light mb-10" role="tablist">
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left active" data-toggle="tab" href="#tabs-1" role="tab"><i
                        class="zmdi zmdi-apps"></i>My Dashboard</a>
        </li>

        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left" href="#" role="tab"><i class="zmdi zmdi-trending-up"></i>Sales
                Insights</a>
        </li>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left" href="#" role="tab"><i class="zmdi zmdi-headset"></i>Help Desk
                Insights</a>
        </li>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left" href="#tabs-4" role="tab"><i class="zmdi zmdi-device-hub"></i>Tickets
                Insights</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-6">
                    <?= MiniList::widget([
                        'title' => AffiliateModule::t('affiliate', 'Note cần gọi trong ngày'),
                        'columns' => [
                            'title',
                            'Khách hàng',
                            'SĐT',
                            'Thời gian gọi',
                            'Thời gian gọi lại',
                            'Note',
                            'Đã gọi lại',
                        ],
                        'url_get_data' => Url::toRoute(["/affiliate/note/get-coming-note"])
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= BarChart::widget([
                        'title' => AffiliateModule::t('affliate', 'Feedback theo giai đoạn'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-feedback-by-type-and-time?type=week"]),
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= PieChart::widget([
                        'title' => AffiliateModule::t('affliate', 'Tổng Feedback'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-feedback-by-type?type=''"]),
                        'unit_title' => 'FB'
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= PieChart::widget([
                        'title' => AffiliateModule::t('affliate', 'Khách hàng đã chuyển đổi trong tháng'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-convert?type=month"]),
                        'unit_title' => 'KH'
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= PieChart::widget([
                        'title' => AffiliateModule::t('affliate', 'Khách hàng đã chuyển đổi trong năm'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-convert?type=year"]),
                        'unit_title' => 'KH'
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= PieChart::widget([
                        'title' => AffiliateModule::t('affliate', 'Khách hàng đã chuyển đổi trong tuần'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-convert?type=week"]),
                        'unit_title' => 'KH'
                    ]) ?>
                </div>
            </div>
            <!-- /Row -->
        </div>
    </div>
</div>