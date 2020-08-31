<?php

namespace modava\chart;

use yii\base\Widget;


class BarChart extends Widget
{
    public $title;
    public $url_get_data;
    public $unit_title;
    public $options = [];

    public function run()
    {
        $html = '
        <div class="card card-bar-chart"
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
                <div class="echart" style="height:400px;"></div>
            </div>
        </div>
        ';

        return $html;
    }
}
