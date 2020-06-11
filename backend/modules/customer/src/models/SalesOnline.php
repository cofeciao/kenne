<?php

namespace modava\customer\models;

use modava\customer\models\table\CustomerTable;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class SalesOnline extends Customer
{
    public $toastr_key = 'sales-online';
    public $country;
    public $province;
    public $district;
    public $agency;
    public $origin;

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'type' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['type']
                ],
                'value' => CustomerTable::TYPE_ONLINE
            ],
            'birthday' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['birthday'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['birthday']
                ],
                'value' => function () {
                    if ($this->birthday != null) return date('Y-m-d', strtotime($this->birthday));
                    return null;
                }
            ]
        ]); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $status_call_dathen = ArrayHelper::map(CustomerStatusCall::getStatusCallDatHen(), 'id', 'id');
        return [
            [['name', 'phone', 'status_call'], 'required'],
            [['name', 'phone', 'address', 'sale_online_note'], 'string', 'max' => 255],
            [['sex', 'ward', 'fanpage_id', 'status_call', 'status_fail', 'co_so'], 'integer'],
            [['birthday'], 'date', 'format' => 'php:d-m-Y'],
            [['co_so'], 'required', 'when' => function () use ($status_call_dathen) {
                return in_array($this->status_call, $status_call_dathen);
            }, 'whenClient' => "function(){
                console.log(" . json_encode(array_values($status_call_dathen)) . ");
                return " . json_encode(array_values($status_call_dathen)) . ".includes($('#status_call').val());
            }"],
            [['country', 'province', 'district', 'agency', 'origin'], 'safe']
        ];
    }
}