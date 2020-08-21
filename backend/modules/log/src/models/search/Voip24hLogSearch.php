<?php

namespace modava\log\models\search;

use GuzzleHttp\Client;
use modava\log\LogModule;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;

class Voip24hLogSearch extends Model
{
    const STATUS = [
        'MISSED' => 'MISSED',
        'ANSWERED' => 'ANSWERED',
        'NO ANSWER' => 'NO ANSWER',
        'FAILED' => 'FAILED',
        'BUSY' => 'BUSY',
    ];
    private $url = 'http://dial.voip24h.vn/dial/search';
    private $voip = '8060769286ab76a8dce8b4530fceba0a1e9985df';
    private $secret = 'c23cd383a29494306edb644ea3f70620';
    private $next;
    private $prev;
    public $dataProvider;
    public $display = 25;
    public $total;
    public $from;
    public $to;
    public $start;
    public $search;
    public $status;

    public function rules()
    {
        return [
            [['search', 'status'], 'string', 'max' => 20],
            [['from', 'to', 'start', 'data'], 'safe'],
            [['from', 'to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'search' => LogModule::t('log', 'Phone'),
            'from' => LogModule::t('log', 'From Date'),
            'to' => LogModule::t('log', 'To Date'),
            'status' => LogModule::t('log', 'Status Call'),
        ];
    }

    public function search($params)
    {
//        echo '<pre>';
//        var_dump($params);
        $this->load($params);
//        var_dump($this->getAttributes());
//        die;
        if ($this->to == null) $this->to = date('d-m-Y');
        if ($this->from == null) $this->from = $this->to;
        $data = $this->getData($this->from . ' 00:00:00', $this->to . ' 23:59:59');
        $pageSize = $this->display;
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => $pageSize
            ]
        ]);
//        echo '<pre>';
//        var_dump($dataProvider);
//        die;
        return $dataProvider;
    }

    public function getPrevPage()
    {
        if ($this->prev == null) return Html::tag('li', Html::tag('span', 'Prev', []), [
            'class' => 'paginate_button page-item disabled page-disabled'
        ]);
        return Html::tag('li', Html::a('Prev', 'javascript:;', [
            'class' => 'page-link',
            'data-start' => $this->prev
        ]), [
            'class' => 'page-item'
        ]);
    }

    public function getNextPage()
    {
        if ($this->next == null) return Html::tag('li', Html::tag('span', 'Next', []), [
            'class' => 'paginate_button page-item disabled page-disabled'
        ]);
        return Html::tag('li', Html::a('Next', 'javascript:;', [
            'class' => 'page-link',
            'data-start' => $this->next
        ]), [
            'class' => 'page-item'
        ]);
    }

    private function getData(string $from = null, string $to = null)
    {
        $query = [
            'voip' => $this->voip,
            'secret' => $this->secret,
            'date_start' => strtotime($from),
            'date_end' => strtotime($to)
        ];
        if ($this->start != null) $query['start'] = $this->start;
        if ($this->search != null) $query['search'] = $this->search;
        if ($this->status != null) $query['status'] = $this->status;
        $client = new Client();
        $response = $client->get($this->url, [
            'query' => $query
        ]);
        if ($response->getStatusCode() != 200) return null;
        $data = json_decode($response->getBody());
        if ($data->status != 200) return null;
        $this->total = $data->result->recordsTotalAll;
        $this->display = $data->result->recordsDisplay;
        $this->next = isset($data->result->next) ? $data->result->next : null;
        $this->prev = isset($data->result->prev) ? $data->result->prev : null;
        return is_array($data->result->data) ? $data->result->data : [];
    }
}