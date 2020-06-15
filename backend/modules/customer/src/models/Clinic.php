<?php

namespace modava\customer\models;

use modava\customer\models\table\CustomerStatusCallTable;
use modava\customer\models\table\CustomerStatusDatHenTable;
use modava\customer\models\table\CustomerTable;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Clinic extends Customer
{
    public $toastr_key = 'sales-online';

    public function behaviors()
    {
        $get_status_call_accept = CustomerStatusCallTable::getStatusCallDatHen();
        $get_status_dat_hen_accept = CustomerStatusDatHenTable::getDatHenDen();
        $status_call_accept = $get_status_call_accept[0]->id;
        $status_dat_hen_accept = $get_status_dat_hen_accept[0]->id;
        return array_merge(parent::behaviors(), [
            'type' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['type']
                ],
                'value' => CustomerTable::TYPE_ONLINE
            ],
            'status_call' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['status_call']
                ],
                'value' => $status_call_accept
            ],
            'status_dat_hen' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['status_dat_hen']
                ],
                'value' => $status_dat_hen_accept
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
            ],
            'time_come' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['time_come'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['time_come']
                ],
                'value' => function () {
                    if ($this->time_come == null) return null;
                    if (is_numeric($this->time_come)) return $this->time_come;
                    return strtotime($this->time_come);
                }
            ]
        ]); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $status_dat_hen_den = ArrayHelper::map(CustomerStatusDatHenTable::getDatHenDen(), 'id', 'id');
        return [
            [['name', 'phone', 'status_dat_hen'], 'required'],
            ['phone', 'unique'],
            [['name', 'phone', 'address', 'direct_sale_note'], 'string', 'max' => 255],
            [['sex', 'ward'], 'integer'],
            [['birthday'], 'date', 'format' => 'php:d-m-Y'],
            [['status_dong_y', 'time_come'], 'required', 'when' => function () use ($status_dat_hen_den) {
                return in_array($this->status_dat_hen, $status_dat_hen_den);
            }, 'whenClient' => "function(){
                return " . json_encode($status_dat_hen_den) . ".includes($('').val());
            }"],
        ];
    }
}