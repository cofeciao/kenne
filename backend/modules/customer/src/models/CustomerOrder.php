<?php

namespace modava\customer\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\customer\CustomerModule;
use modava\customer\models\table\CustomerOrderTable;
use modava\settings\models\SettingCoSo;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "customer_order".
 *
 * @property int $id
 * @property int $customer_id Mã khách hàng
 * @property string $code Mã đơn hàng
 * @property double $total Tổng tiền
 * @property double $discount Chiết khấu
 * @property int $status
 * @property int $co_so Đơn hàng lập ở cơ sở nào
 * @property int $ordered_at Ngày lập đơn
 * @property int $created_at Ngày nhập đơn vào hệ thống
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property SettingCoSo $coSo
 * @property User $createdBy
 * @property Customer $customer
 * @property User $updatedBy
 * @property CustomerTreatmentSchedule[] $customerTreatmentSchedules
 */
class CustomerOrder extends CustomerOrderTable
{
    public $toastr_key = 'customer-order';
    public $order_detail;

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
                    'preserveNonEmptyValues' => true,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
                'ordered_at' => [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['ordered_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['ordered_at'],
                    ],
                    'value' => function () {
                        if ($this->ordered_at != null) {
                            if (is_string($this->ordered_at)) return strtotime($this->ordered_at);
                            else if (is_numeric($this->ordered_at)) return $this->ordered_at;
                        }
                        return time();
                    }
                ]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'status', 'co_so'], 'integer'],
            [['total', 'discount'], 'number'],
            [['co_so'], 'exist', 'skipOnError' => true, 'targetClass' => SettingCoSo::class, 'targetAttribute' => ['co_so' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['ordered_at', 'product_id', 'qty', 'price', 'total_price', 'discount', 'discount_by', 'reason_discount', 'total'], 'safe'],
            [['order_detail'], 'validateOrderDetail']
        ];
    }

    public function validateOrderDetail()
    {
        if (!$this->hasErrors() && is_array($this->order_detail)) {
            foreach ($this->order_detail as $i => $order_detail) {
                $customerOrderDetail = new CustomerOrderDetail();
                $customerOrderDetail->setAttributes($order_detail);
                if (!$customerOrderDetail->validate()) {
                    foreach ($customerOrderDetail->getErrors() as $k => $error) {
                        $this->addError("order_detail[$i][$k]", $error);
                    }
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => CustomerModule::t('customer', 'ID'),
            'customer_id' => CustomerModule::t('customer', 'Customer ID'),
            'code' => CustomerModule::t('customer', 'Code'),
            'total' => CustomerModule::t('customer', 'Total'),
            'discount' => CustomerModule::t('customer', 'Discount'),
            'status' => CustomerModule::t('customer', 'Status'),
            'co_so' => CustomerModule::t('customer', 'Co So'),
            'ordered_at' => CustomerModule::t('customer', 'Ordered At'),
            'created_at' => CustomerModule::t('customer', 'Created At'),
            'updated_at' => CustomerModule::t('customer', 'Updated At'),
            'created_by' => CustomerModule::t('customer', 'Created By'),
            'updated_by' => CustomerModule::t('customer', 'Updated By'),
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
