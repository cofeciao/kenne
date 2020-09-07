<?php

namespace modava\chart;

use yii\base\Widget;


class MiniList extends Widget
{
    public $title;
    public $url_get_data;
    public $unit_title;
    public $columns = [];
    public $options = [];

    public function run()
    {
        $header = '';

        foreach ($this->columns as $column) {
            $header .= "<th> {$column} </th>";
        }
        $html = '
            <div class="card mini-list"
            data-url-get-data="' . $this->url_get_data . '"
             data-columns=\'' . json_encode($this->columns) . '\'>
                <div class="card-header card-header-action">
                    <h6>' . $this->title . '</h6>
                    <div class="d-flex align-items-center card-action-wrap">
                        <a href="#" class="inline-block refresh mr-15" title="Làm mới">
                            <i class="ion ion-md-radio-button-off"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mini-list" style="height:400px;">
                        <table class="table-bordered table table-responsive mini-list" height="100%">
                            <thead>
                            <tr>' . $header . '</tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        ';

        return $html;
    }
}
