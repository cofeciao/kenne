<?php

namespace modava\orders\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\orders\OrdersModule;
use modava\orders\models\table\OrdersTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "orders".
*
    * @property int $id
    * @property int $id_tr
    * @property int $id_pro
    * @property int $or_quantity số lượng mua
    * @property int $or_price
    *
            * @property Products $pro
            * @property Transactions $tr
    */
class Orders extends OrdersTable
{
    public $toastr_key = 'orders';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['id_tr', 'id_pro', 'or_quantity', 'or_price'], 'required'],
			[['id_tr', 'id_pro', 'or_quantity', 'or_price'], 'integer'],
			[['id_pro'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['id_pro' => 'id']],
			[['id_tr'], 'exist', 'skipOnError' => true, 'targetClass' => Transactions::class, 'targetAttribute' => ['id_tr' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => OrdersModule::t('orders', 'ID'),
            'id_tr' => OrdersModule::t('orders', 'Id Tr'),
            'id_pro' => OrdersModule::t('orders', 'Id Pro'),
            'or_quantity' => OrdersModule::t('orders', 'Or Quantity'),
            'or_price' => OrdersModule::t('orders', 'Or Price'),
        ];
    }


}
