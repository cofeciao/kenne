<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\helpers\Utils;
use modava\iway\models\table\ReceiptTable;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

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
            * @property IwayOrder $order
            * @property User $updatedBy
    */
class Receipt extends ReceiptTable
{
    public $toastr_key = 'receipt';

    protected $numberFields = [ 'amount' ];

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
		];
    }

    public function transformValueForRecord ()
    {
        // Existed record
        if ($this->primaryKey) {
            // Do something
            $this->receipt_date = Utils::convertDateTimeToDisplayFormat($this->receipt_date);
            $this->convertToDisplayNumber();
        }
        // New Record
        else {
            $this->status = 'nhap';
            $this->receipt_date = date('d-m-Y H:i');
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

    public function getOrder ()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
