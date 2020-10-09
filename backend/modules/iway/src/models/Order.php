<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\helpers\Utils;
use modava\iway\models\table\OrderDetailTable;
use modava\iway\models\table\OrderTable;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "iway_order".
 *
 * @property int $id
 * @property string $title
 * @property string $code Mã đơn hàng
 * @property int $co_so_id Cơ sở
 * @property int $customer_id Khách hàng
 * @property string $order_date Ngày đơn hàng
 * @property string $status Tình trạng đơn hàng
 * @property string $payment_status Tình trạng thanh toán
 * @property string $service_status Tình trạng dịch vụ
 * @property string $total Tổng tiền (trước chiết khấu)
 * @property string $discount_type Loại giảm giá
 * @property string $discount_value Giảm giá theo loại
 * @property string $discount Giảm giá cuối cùng: nếu loại là percent thì = discount_value * total / 100, nếu loại là trực tiếp thì = discount_value
 * @property string $final_total Tổng tiền
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property Customer $customer
 * @property User $updatedBy
 */
class Order extends OrderTable
{
    public $toastr_key = 'order';

    public $order_detail; /* Field ảo */

    const GIAM_GIA_TRUC_TIEP = '1';
    const GIAM_GIA_PHAN_TRAM = '2';

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
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['order_date'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['order_date'],
                    ],
                    'value' => function ($event) {
                        return Utils::convertDateToDBFormat($this->order_date);
                    },
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
            [['title', 'co_so_id', 'customer_id', 'order_date'], 'required'],
            [['co_so_id', 'customer_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['order_date'], 'safe'],
            [['total', 'discount', 'final_total', 'discount_value'], 'number'],
            [['title', 'code', 'discount_type'], 'string', 'max' => 255],
            [['status', 'payment_status', 'service_status'], 'string', 'max' => 50],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            ['order_detail', 'validateSalesOrderDetail'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'code' => Yii::t('backend', 'Code'),
            'co_so_id' => Yii::t('backend', 'Cơ sở'),
            'customer_id' => Yii::t('backend', 'Khách hàng'),
            'order_date' => Yii::t('backend', 'Ngày đơn hàng'),
            'status' => Yii::t('backend', 'Tình trạng đơn hàng'),
            'payment_status' => Yii::t('backend', 'Tình trạng thanh toán'),
            'service_status' => Yii::t('backend', 'Tình trạng dịch vụ'),
            'total' => Yii::t('backend', 'Tổng tiền (trước giảm giá)'),
            'discount' => Yii::t('backend', 'Giảm giá'),
            'final_total' => Yii::t('backend', 'Tổng tiền'),
            'created_at' => Yii::t('backend', 'Created At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_at' => Yii::t('backend', 'Updated At'),
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

    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    public function getCoSo()
    {
        return $this->hasOne(CoSo::class, ['id' => 'co_so_id']);
    }

    public function getSalesOrderDetails() {
        return $this->hasMany(OrderDetail::class, ['order_id' => 'id']);
    }

    public function saveSalesOrderDetail () {

        $orderNotDelete = [];

        foreach ($this->order_detail as $orderDetail) {
            if ($orderDetail['id']) {
                $orderDetailModel = OrderDetail::find()->where(['id' => $orderDetail['id']])->one();
            }
            else {
                $orderDetailModel = new OrderDetail();
            }

            $orderDetailModel->setAttributes($orderDetail, false);
            $orderDetailModel->setAttribute('order_id', $this->primaryKey);
            $orderDetailModel->save();


            $orderNotDelete[] = $orderDetailModel->id;
        }

        OrderDetailTable::deleteAll(['AND', ['order_id' => $this->primaryKey], ['NOT IN', 'id', $orderNotDelete]]);

        return true;
    }

    public function validateSalesOrderDetail()
    {
        if (!$this->hasErrors() && is_array($this->order_detail)) {
            foreach ($this->order_detail as $i => $salesorder_detail) {
                $salesOrderDetail = new OrderDetail();
                $salesOrderDetail->setAttributes($salesorder_detail, false);
                if (!$salesOrderDetail->validate()) {
                    foreach ($salesOrderDetail->getErrors() as $k => $error) {
                        $this->addError("order_detail[$i][$k]", $error[0]);
                    }
                }
            }
        }
    }
}
