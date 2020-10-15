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
 * @property string $received Đã thu
 * @property string $balance còn lại
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
    const GIAM_GIA_TRUC_TIEP = '1';
    const GIAM_GIA_PHAN_TRAM = '2';
    const SCENARIO_NONE_LINE_ITEM = 'none_line_item';

    public $toastr_key = 'order'; /* Field ảo */

    public $order_detail;
    protected $numberFields = ['discount_value', 'total', 'discount', 'final_total'];


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
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['payment_status'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['payment_status'],
                    ],
                    'value' => function ($event) {
                        if ($this->isNewRecord) $this->payment_status = 'chua_thanh_toan';
                        return $this->payment_status;
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['service_status'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['service_status'],
                    ],
                    'value' => function ($event) {
                        if ($this->isNewRecord) $this->service_status = 'chua_dieu_tri';
                        return $this->service_status;
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['balance'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['balance'],
                    ],
                    'value' => function ($event) {
                        return $this->final_total - $this->received;
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['received'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['received'],
                    ],
                    'value' => function ($event) {
                        if (!$this->primaryKey) return 0;

                        return Receipt::getTotalReceivedByOrder($this->primaryKey);
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['payment_status'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['payment_status'],
                    ],
                    'value' => function ($event) {
                        if ($this->payment_status === 'hoan_coc') return 'hoan_coc'; // Dont remove this line!!!
                        if ($this->balance == 0) return 'thanh_toan_du';
                        if ($this->balance > 0 && $this->balance < $this->final_total) return 'thanh_toan_1_phan';
                        return 'chua_thanh_toan';
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['status'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['status'],
                    ],
                    'value' => function ($event) {
                        if ($this->status === 'huy') return 'huy'; // Dont remove this line!!!
                        if ($this->isNewRecord || ($this->service_status === 'chua_dieu_tri' && $this->payment_status === 'chua_thanh_toan')) return 'moi';
                        if ($this->payment_status === 'thanh_toan_du' && $this->service_status === 'hoan_thanh') return 'hoan_thanh';
                        if ($this->payment_status === 'hoan_coc') return 'huy';
                        if (in_array($this->service_status, ['dang_thuc_hien', 'thanh_toan_du']) || $this->payment_status !== 'chua_dieu_tri') return 'dang_thuc_hien';

                        return $this->status;
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
            [['order_date', 'discount_value'], 'safe'],
            [['total', 'discount', 'final_total', 'received', 'balance'], 'number'],
            [['title', 'code', 'discount_type'], 'string', 'max' => 255],
            [['status', 'payment_status', 'service_status'], 'string', 'max' => 50],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            ['order_detail', 'validateSalesOrderDetail'],
            ['order_detail', 'safe', 'on' => self::SCENARIO_NONE_LINE_ITEM],
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
            'received' => Yii::t('backend', 'Đã thu'),
            'balance' => Yii::t('backend', 'Còn lại'),
        ];
    }

    public function beforeSave($insert)
    {
        $this->calcAndUpdateTotalDiscountFinalTotal();
        return parent::beforeSave($insert);
    }

    public function calcAndUpdateTotalDiscountFinalTotal()
    {
        if ($this->scenario === self::SCENARIO_NONE_LINE_ITEM) return;

        $total = 0;

        // Tính tổng tiền (trước giảm giá)
        foreach ($this->order_detail as $orderDetail) {
            $finalTotalLineItem = 0;
            $totalLineItem = Utils::convertToRawNumber($orderDetail['price']) * $orderDetail['qty'];

            if ($orderDetail['discount_type'] == Order::GIAM_GIA_TRUC_TIEP) {
                $finalTotalLineItem = $totalLineItem - Utils::convertToRawNumber($orderDetail['discount_value']);
            } else {
                $finalTotalLineItem = $totalLineItem - ($orderDetail['discount_value'] * $totalLineItem / 100);
            }

            $total += $finalTotalLineItem;
        }

        // Tính Giảm giá
        if ($this->discount_type == Order::GIAM_GIA_TRUC_TIEP) {
            $discount = $this->discount_value;
        } else {
            $discount = $this->discount_value * $total / 100;
        }

        // Tính tổng tiền
        $finalTotal = $total - $discount;

        $this->total = $total;
        $this->discount = $discount;
        $this->final_total = $finalTotal;
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

    public function getSalesOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, ['order_id' => 'id']);
    }

    public function saveSalesOrderDetail()
    {

        $orderNotDelete = [];

        foreach ($this->order_detail as $orderDetail) {
            if ($orderDetail['id']) {
                $orderDetailModel = OrderDetail::find()->where(['id' => $orderDetail['id']])->one();
            } else {
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
