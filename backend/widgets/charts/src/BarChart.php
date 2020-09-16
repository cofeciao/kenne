<?php

namespace modava\charts;

use yii\base\InvalidCallException;
use yii\base\Widget;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class BarChart extends Widget
{
    /* Id của element chart - không trùng */
    public $id = 'bar-chart';

    public $renderInCard = true;

    public $title = '';

    public $url_get_data = '';

    public $height;

    public $xKey;

    public $yKey;

    public $options = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $view = $this->getView();
        BarChartAssets::register($view);
        BarChartCustomAssets::register($view);

        $chart = $this->__renderChart();
        echo $this->renderInCard ? $this->__pushChartIntoCardContainer($chart) : $chart;

        $js = $this->__registerJsChart();
        $view->registerJs($js);
    }

    private function __registerJsChart()
    {
        $option = json_encode($this->options);
        $script = <<< JS
            let option = $option

            loadBarChart1($('#$this->id'), option);
            $('#$this->id').closest('.card').find('.refresh').on('click', function () {
                loadBarChart1($('#$this->id'), option)
            });
JS;
        return $script;
    }

    private function __renderChart()
    {
        return '<div id="' . $this->id . '" class="" style="height: ' . $this->height . '" data-chart-url="' . $this->url_get_data . '"></div>';
    }

    private function __pushChartIntoCardContainer($chart)
    {
        return '
        <div class="card">
            <div class="card-header card-header-action">
                <h6>' . $this->title . '</h6>
                <div class="d-flex align-items-center card-action-wrap">
                    <a href="#" class="inline-block refresh mr-15" title="' . \Yii::t('affiliate', 'Làm mới') . '">
                        <i class="ion ion-md-radio-button-off"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                    ' . $chart . '
            </div>
        </div>
        ';
    }
}