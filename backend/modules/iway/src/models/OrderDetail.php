<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\helpers\Utils;
use modava\iway\models\table\OrderDetailTable;
use modava\product\models\Product;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "iway_order_detail".
 *
 * @property int $id
 * @property int $product_id Sản phẩm
 * @property int $order_id Đơn hàng
 * @property int $qty Số lượng
 * @property string $price Giá
 * @property int $discount_type 1. Giảm giá trực tiếp, 2 Giảm theo %
 * @property string $discount_value Giá trị giảm giá
 * @property string $discount Giá trị giảm giá, được tính từ discount_type discount_value
 * @property string $description Mô tả
 * @property string $total Tổng cộng (trước giảm giá)
 * @property string $final_total Tổng cộng
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property Order $order
 * @property Product $product
 * @property User $updatedBy
 */
class OrderDetail extends OrderDetailTable
{
    const SCENARIO_SAVE = 'save';
    public $toastr_key = 'order-detail';
    protected $numberFields = ['price', 'discount_value', 'discount', 'total', 'final_total'];

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
                        ActiveRecord::EVENT_BEFORE_INSERT => ['final_total'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['final_total'],
                    ],
                    'value' => function ($event) {
                        return $this->total = $this->qty * $this->price;
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['discount'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['discount'],
                    ],
                    'value' => function ($event) {
                        if ($this->discount_type == Order::GIAM_GIA_TRUC_TIEP) {
                            $this->discount = $this->discount_value;
                        } else {
                            $this->discount = $this->total * $this->discount_value / 100;
                        }
                        return $this->discount;
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['final_total'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['final_total'],
                    ],
                    'value' => function ($event) {
                        return $this->total - $this->discount;
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
            [['product_id', 'qty'], 'required'],
            [['product_id', 'order_id', 'qty', 'discount_type', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['price', 'discount_value', 'discount', 'total', 'final_total'], 'number'],
            [['description'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_id' => Yii::t('backend', 'Sản phẩm'),
            'order_id' => Yii::t('backend', 'Đơn hàng'),
            'qty' => Yii::t('backend', 'Số lượng'),
            'price' => Yii::t('backend', 'Giá'),
            'discount_type' => Yii::t('backend', 'Loại giảm giá'),
            'discount_value' => Yii::t('backend', 'Giảm giá'),
            'discount' => Yii::t('backend', 'Giảm giá'),
            'description' => Yii::t('backend', 'Mô tả'),
            'total' => Yii::t('backend', 'Thành tiền'),
            'final_total' => Yii::t('backend', 'Thành tiền'),
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

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
