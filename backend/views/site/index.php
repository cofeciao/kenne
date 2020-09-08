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

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid mt-xl-50- mt-sm-30- mt-10 px-xxl-65- px-xl-15">

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-6">
                    <?= MiniList::widget([
                        'title' => Yii::t('backend', 'Note cần gọi trong ngày'),
                        'columns' => [
                            'title',
                            'Khách hàng',
                            'SĐT',
                            'Đã gọi lại',
                            'Thời gian gọi',
                            'Thời gian gọi lại',
                            'Note',
                        ],
                        'url_get_data' => Url::toRoute(["/affiliate/note/get-coming-note"]),
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= BarChart::widget([
                        'title' => Yii::t('affliate', 'Feedback theo giai đoạn'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-feedback-by-type-and-time?type=week"]),
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= PieChart::widget([
                        'title' => Yii::t('affliate', 'Tổng Feedback'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-feedback-by-type?type=''"]),
                        'unit_title' => 'FB'
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= PieChart::widget([
                        'title' => Yii::t('affliate', 'Khách hàng đã chuyển đổi trong tháng'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-convert?type=month"]),
                        'unit_title' => 'KH'
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= PieChart::widget([
                        'title' => Yii::t('affliate', 'Khách hàng đã chuyển đổi trong năm'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-convert?type=year"]),
                        'unit_title' => 'KH'
                    ]) ?>
                </div>
                <div class="col-xl-6">
                    <?= PieChart::widget([
                        'title' => Yii::t('affliate', 'Khách hàng đã chuyển đổi trong tuần'),
                        'url_get_data' => Url::toRoute(["/affiliate/affiliate/get-total-convert?type=week"]),
                        'unit_title' => 'KH'
                    ]) ?>
                </div>
            </div>
            <!-- /Row -->
        </div>
    </div>
</div>