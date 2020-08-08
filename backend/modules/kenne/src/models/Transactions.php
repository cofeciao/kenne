<?php

namespace modava\kenne\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\TransactionsTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "transactions".
*
    * @property int $id
    * @property int $tr_id_customer
    * @property string $tr_name
    * @property string $tr_address
    * @property int $tr_phone
    * @property int $tr_status
    * @property int $tr_total
    * @property int $created_at
    * @property int $updated_at
    *
            * @property Orders[] $orders
            * @property Customer $trIdCustomer
    */
class Transactions extends TransactionsTable
{
    const ACTIVE_TRANSACTION = 2;
    const DISACTIVE_TRANSACTION = 1;
    public $toastr_key = 'transactions';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'preserveNonEmptyValues' => true,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['tr_id_customer', 'tr_name', 'tr_address', 'tr_phone'], 'required'],
			[['tr_id_customer', 'tr_phone', 'tr_status', 'tr_total', 'created_at', 'updated_at'], 'integer'],
			[['tr_name', 'tr_address'], 'string', 'max' => 255],
			[['tr_id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['tr_id_customer' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'tr_id_customer' => KenneModule::t('kenne', 'Tr Id Customer'),
            'tr_name' => KenneModule::t('kenne', 'Tr Name'),
            'tr_address' => KenneModule::t('kenne', 'Tr Address'),
            'tr_phone' => KenneModule::t('kenne', 'Tr Phone'),
            'tr_status' => KenneModule::t('kenne', 'Tr Status'),
            'tr_total' => KenneModule::t('kenne', 'Tr Total'),
            'created_at' => KenneModule::t('kenne', 'Created At'),
            'updated_at' => KenneModule::t('kenne', 'Updated At'),
        ];
    }


}
