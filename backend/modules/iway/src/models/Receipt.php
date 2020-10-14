<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\helpers\Utils;
use modava\iway\models\table\ReceiptTable;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "iway_receipt".
 *
 * @property int $id
 * @property string $title Tiêu đề
 * @property string $status Tình trạng
 * @property string $receipt_date Ngày thu
 * @property string $amount Số tiền
 * @property string $description Mô tả
 * @property int $order_id Đơn hàng
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property Order $order
 * @property User $updatedBy
 */
class Receipt extends ReceiptTable
{
    public $toastr_key = 'receipt';

    protected $numberFields = ['amount'];

    public static function getTotalReceivedByOrder($orderId)
    {
        return (float) self::getRecordsByOrderWithStatus($orderId, 'da_thu')->sum('amount') - (float) self::getRecordsByOrderWithStatus($orderId, 'hoan_coc')->sum('amount');
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
                        ActiveRecord::EVENT_BEFORE_INSERT => ['receipt_date'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['receipt_date'],
                    ],
                    'value' => function ($event) {
                        return Utils::convertDateTimeToDBFormat($this->receipt_date);
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
            [['title', 'status', 'receipt_date', 'order_id'], 'required'],
            [['receipt_date'], 'safe'],
            [['description'], 'string'],
            [['amount'], 'number', 'numberPattern' => '/(\d{0,3},)?(\d{3},)?\d{0,3}/'],
            [['order_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 50],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            ['amount', 'validateAmount'],
            ['order_id', 'validateOrder'],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->updateOrder();
        parent::afterSave($insert, $changedAttributes);
    }

    public function updateOrder()
    {
        $totalReceipt = self::getRecordsByOrderWithStatus($this->order_id, 'da_thu')->sum('amount');
        $totalRefundQuery = self::getRecordsByOrderWithStatus($this->order_id, 'hoan_coc');
        $totalRefund = $totalRefundQuery->sum('amount');
        $orderReceive = $totalReceipt - $totalRefund;

        $order = Order::findOne($this->order_id);
        $order->scenario = Order::SCENARIO_NONE_LINE_ITEM;
        $order->received = $orderReceive;

        if ($totalRefundQuery->count()) {
            $order->payment_status = 'hoan_coc';
        }

        $order->save();
    }

    public static function getRecordsByOrderWithStatus($orderId, $status = null, $ignoreId = null)
    {
        $query = self::find()->where(['order_id' => $orderId])->andFilterWhere(['status' => $status]);

        if ($ignoreId) {
            $condition = is_array($ignoreId) ? 'NOT IN' : '!=';
            $query->andWhere([$condition, 'id', $ignoreId]);
        }

        return $query;
    }

    public function afterDelete()
    {
        $this->updateOrder();
        return parent::afterDelete();
    }

    public function validateAmount()
    {
        $order = Order::findOne($this->order_id);
        $received = (float) self::getRecordsByOrderWithStatus($this->order_id, 'da_thu', $this->primaryKey)->sum('amount');
        $balance = ((float) $order->final_total) - $received;

        if ($this->status === 'da_thu' && $order && (float) $this->amount > $balance) {
            $this->addError('amount', 'Số tiền không được lớn hơn tiền còn lại trong đơn hàng');
        }

        if ($this->status === 'hoan_coc' && $order && (float) $this->amount > (float) $order->received) {
            $this->addError('amount', 'Số tiền hoàn cọc không được lớn hơn số tiền đã nhận');
        }
    }

    public function validateOrder()
    {
        $order = Order::findOne($this->order_id);
        if ($order && $order->status === 'huy') {
            $this->addError('order_id', 'Đơn hàng đã hủy không thể tạo hoặc cập nhật phiếu thu');
        }
    }

    public function transformValueForRecord()
    {
        parent::transformValueForRecord();
        // Existed record
        if ($this->primaryKey) {
            // Do something
            $this->receipt_date = Utils::convertDateTimeToDisplayFormat($this->receipt_date);
        } // New Record
        else {
            if (!$this->status) $this->status = 'nhap';
            if (!$this->receipt_date) $this->receipt_date = date('d-m-Y H:i');
            if ($this->order_id && !Order::findOne($this->order_id)) $this->order_id = null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'status' => Yii::t('backend', 'Tình trạng'),
            'receipt_date' => Yii::t('backend', 'Ngày thu'),
            'amount' => Yii::t('backend', 'Số tiền'),
            'description' => Yii::t('backend', 'Description'),
            'order_id' => Yii::t('backend', 'Đơn hàng'),
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

    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
