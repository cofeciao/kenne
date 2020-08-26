<?php

namespace modava\affiliate\models;

use common\models\User;
use modava\affiliate\AffiliateModule;
use modava\affiliate\models\table\ReceiptTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use common\helpers\MyHelper;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "affiliate_receipt".
*
    * @property int $id
    * @property string $slug
    * @property string $title
    * @property int $order_id Mã đơn hàng
    * @property string $total Số tiền
    * @property int $status 0: Thanh toán, 1: Đặt cọc, 2: Hoàn cọc
    * @property string $payment_method Số tiền còn lại
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property User $createdBy
            * @property User $updatedBy
            * @property AffiliateOrder $order
    */
class Receipt extends ReceiptTable
{
    public $toastr_key = 'receipt';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'slug' => [
                    'class' => SluggableBehavior::class,
                    'immutable' => false,
                    'ensureUnique' => true,
                    'value' => function () {
                        return MyHelper::createAlias($this->title);
                    }
                ],
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
			[['slug', 'title', 'order_id', 'total', 'status', 'created_at', 'updated_at'], 'required'],
			[['order_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['total'], 'number'],
			[['slug', 'title', 'payment_method'], 'string', 'max' => 255],
			[['slug'], 'unique'],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
			[['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => AffiliateOrder::class, 'targetAttribute' => ['order_id' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => AffiliateModule::t('affiliate', 'ID'),
            'slug' => AffiliateModule::t('affiliate', 'Slug'),
            'title' => AffiliateModule::t('affiliate', 'Title'),
            'order_id' => AffiliateModule::t('affiliate', 'Order ID'),
            'total' => AffiliateModule::t('affiliate', 'Total'),
            'status' => AffiliateModule::t('affiliate', 'Status'),
            'payment_method' => AffiliateModule::t('affiliate', 'Payment Method'),
            'created_at' => AffiliateModule::t('affiliate', 'Created At'),
            'updated_at' => AffiliateModule::t('affiliate', 'Updated At'),
            'created_by' => AffiliateModule::t('affiliate', 'Created By'),
            'updated_by' => AffiliateModule::t('affiliate', 'Updated By'),
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
