<?php

namespace modava\customer\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\customer\CustomerModule;
use modava\customer\models\table\CustomerPaymentTable;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "customer_payment".
 *
 * @property int $id
 * @property int $order_id
 * @property double $price Tiền thanh toán
 * @property int $payments "Loại thanh toán: Đặt cọc, thanh toán, ..."
 * @property int $type "Hình thức thanh toán: Chuyển khoản, tiền mặt, ..."
 * @property int $co_so Thanh toán lập ở cơ sở nào
 * @property int $payment_at Ngày thanh toán
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class CustomerPayment extends CustomerPaymentTable
{
    public $toastr_key = 'customer-payment';
    public $customer_id;

    public function __construct($config = [])
    {
        parent::__construct($config);
        if ($this->orderHasOne != null && $this->orderHasOne->customerHasOne != null) {
            $this->customer_id = $this->orderHasOne->customerHasOne->id;
        }
    }

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
                'payment_at' => [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => 'payment_at',
                        ActiveRecord::EVENT_BEFORE_UPDATE => 'payment_at',
                    ],
                    'value' => function () {
                        if (is_string($this->payment_at)) return strtotime($this->payment_at);
                        if (is_numeric($this->payment_at)) return $this->payment_at;
                        return time();
                    }
                ],
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
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
            [['order_id', 'payments', 'type'], 'required'],
            [['order_id', 'payments', 'type', 'co_so'], 'integer'],
            [['price'], 'number'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['payment_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'order_id' => Yii::t('backend', 'Order ID'),
            'price' => Yii::t('backend', 'Price'),
            'payments' => Yii::t('backend', 'Payments'),
            'type' => Yii::t('backend', 'Type'),
            'co_so' => Yii::t('backend', 'Co So'),
            'payment_at' => Yii::t('backend', 'Payment At'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_by' => Yii::t('backend', 'Updated By'),
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
