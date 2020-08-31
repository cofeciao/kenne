<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\IwayModule;
use modava\iway\models\table\OrderTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "iway_order".
*
    * @property int $id
    * @property string $code Mã đơn hàng
    * @property int $ordered_at Ngày lập đơn
    * @property int $customer_id Mã khách hàng
    * @property string $status Tình trạng đơn hàng
    * @property int $co_so Đơn hàng lập ở cơ sở nào
    * @property double $total Tổng tiền
    * @property double $discount Chiết khấu
    * @property int $created_at Ngày nhập đơn vào hệ thống
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property IwayCoSo $coSo
            * @property User $createdBy
            * @property IwayCustomer $customer
            * @property User $updatedBy
            * @property IwayOrderDetail[] $iwayOrderDetails
            * @property IwayPayment[] $iwayPayments
            * @property IwayTreatmentSchedule[] $iwayTreatmentSchedules
    */
class Order extends OrderTable
{
    public $toastr_key = 'order';
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
			[['ordered_at', 'customer_id', 'co_so', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['customer_id'], 'required'],
			[['total', 'discount'], 'number'],
			[['code'], 'string', 'max' => 100],
			[['status'], 'string', 'max' => 255],
			[['co_so'], 'exist', 'skipOnError' => true, 'targetClass' => IwayCoSo::class, 'targetAttribute' => ['co_so' => 'id']],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
			[['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => IwayCustomer::class, 'targetAttribute' => ['customer_id' => 'id']],
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
            'code' => IwayModule::t('iway', 'Code'),
            'ordered_at' => IwayModule::t('iway', 'Ordered At'),
            'customer_id' => IwayModule::t('iway', 'Customer ID'),
            'status' => IwayModule::t('iway', 'Status'),
            'co_so' => IwayModule::t('iway', 'Co So'),
            'total' => IwayModule::t('iway', 'Total'),
            'discount' => IwayModule::t('iway', 'Discount'),
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
