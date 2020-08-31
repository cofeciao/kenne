<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\IwayModule;
use modava\iway\models\table\PaymentTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "iway_payment".
*
    * @property int $id
    * @property int $order_id
    * @property int $customer_id
    * @property double $price Tiền thanh toán
    * @property string $type "Loại thanh toán: 0: Thanh toán, 1: Đặt cọc, ..."
    * @property string $method "Hình thức thanh toán: Tiền mặt, Chuyển khoản, ..."
    * @property int $co_so Thanh toán lập ở cơ sở nào
    * @property int $payment_at Ngày thanh toán
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property CoSo $coSo
            * @property User $createdBy
            * @property Order $order
            * @property User $updatedBy
    */
class Payment extends PaymentTable
{
    public $toastr_key = 'payment';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'created_by',
                    'updatedByAttribute' => 'updated_by',
                ],
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'preserveNonEmptyValues' => false,
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
			[['order_id', 'customer_id', 'type', 'method'], 'required'],
			[['order_id', 'co_so', 'payment_at', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['price'], 'number'],
			[['type', 'method'], 'string', 'max' => 255],
			[['co_so'], 'exist', 'skipOnError' => true, 'targetClass' => CoSo::class, 'targetAttribute' => ['co_so' => 'id']],
			[['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
			[['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => IwayModule::t('iway', 'ID'),
            'order_id' => IwayModule::t('iway', 'Đơn hàng'),
            'price' => IwayModule::t('iway', 'Giá'),
            'type' => IwayModule::t('iway', 'Loại'),
            'method' => IwayModule::t('iway', 'Phương thức thanh toán'),
            'co_so' => IwayModule::t('iway', 'Cơ sở'),
            'customer_id' => IwayModule::t('iway', 'Khách hàng'),
            'payment_at' => IwayModule::t('iway', 'Payment At'),
            'created_at' => IwayModule::t('iway', 'Created At'),
            'updated_at' => IwayModule::t('iway', 'Updated At'),
            'created_by' => IwayModule::t('iway', 'Created By'),
            'updated_by' => IwayModule::t('iway', 'Updated By'),
        ];
    }

    /**
    * Gets query for [[User]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getUserCreated()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
    * Gets query for [[User]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getUserUpdated()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
