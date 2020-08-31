<?php

namespace modava\chart;

use yii\base\Widget;


class PieChart extends Widget
{
    public $title;
    public $url_get_data;
    public $unit_title;

    public $options = [];

    public function run()
    {
        $html = '
        <div class="card card-pie-chart"
             data-chart-url="' . $this->url_get_data . '"
             data-chart-type="pie-chart">
            <div class="card-header card-header-action">
                <h6>' . $this->title . '</h6>
                <div class="d-flex align-items-center card-action-wrap">
                    <a href="#" class="inline-block refresh mr-15" title="Làm mới">
                        <i class="ion ion-md-radio-button-off"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-5">
                    <div class="display-5 text-dark"><span class="card-total"></span> <span class="font-14">' . $this->unit_title . '</span>
                    </div>
                    <div class="font-16 text-green font-weight-500">
                        <i class="ion ion-md-arrow-up mr-5" style="display: none"></i>
                        <span class="total-up-down"></span>
                    </div>
                </div>
                <div class="echart" style="height:220px;"></div>
                <!--<div class="hk-legend-wrap mt-10">
                    <div class="hk-legend">
                        <span class="d-10 bg-green rounded-circle d-inline-block"></span><span>Today</span>
                    </div>
                    <div class="hk-legend">
                        <span class="d-10 bg-green-light-1 rounded-circle d-inline-block"></span><span>Yesterday</span>
                    </div>
                </div>-->
            </div>
        </div>
        ';

        return $html;
    }
}
