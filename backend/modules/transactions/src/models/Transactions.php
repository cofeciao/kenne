<?php

namespace modava\transactions\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\transactions\TransactionsModule;
use modava\transactions\models\table\TransactionsTable;
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
            * @property Customer $trIdCustomer
    */
class Transactions extends TransactionsTable
{
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
            'id' => TransactionsModule::t('transactions', 'ID'),
            'tr_id_customer' => TransactionsModule::t('transactions', 'Tr Id Customer'),
            'tr_name' => TransactionsModule::t('transactions', 'Tr Name'),
            'tr_address' => TransactionsModule::t('transactions', 'Tr Address'),
            'tr_phone' => TransactionsModule::t('transactions', 'Tr Phone'),
            'tr_status' => TransactionsModule::t('transactions', 'Tr Status'),
            'tr_total' => TransactionsModule::t('transactions', 'Tr Total'),
            'created_at' => TransactionsModule::t('transactions', 'Created At'),
            'updated_at' => TransactionsModule::t('transactions', 'Updated At'),
        ];
    }


}
