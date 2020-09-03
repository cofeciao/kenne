<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\helpers\Utils;
use modava\iway\IwayModule;
use modava\iway\models\table\CustomerTable;
use modava\location\models\LocationCountry;
use modava\location\models\LocationDistrict;
use modava\location\models\LocationProvince;
use modava\location\models\LocationWard;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "iway_customer".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $birthday
 * @property string $sex
 * @property string $phone
 * @property string $address
 * @property int $ward_id
 * @property string $avatar
 * @property int $fanpage_id
 * @property string $type Chưa xác định - Khách online - Khách vãng lai ...
 * @property int $online_sales_id Quyền thuộc về nhân viên nào
 * @property string $sale_online_note Ghi chú của Sales Online
 * @property int $direct_sale_id Direct Sale phụ trách
 * @property string $direct_sale_note Ghi chú của Direct Sale
 * @property int $co_so
 * @property string $status Tình trạng khách hàng
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property CoSo $coSo
 * @property User $createdBy
 * @property User $directSale
 * @property User $permissionUser
 * @property User $updatedBy
 * @property LocationWard $ward0
 * @property Fanpage $fanpage
 * @property Order[] $iwayOrders
 */
class Customer extends CustomerTable
{
    public $toastr_key = 'customer';
    const PREFIX_CODE = 'IWAY-CUS';

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
                        ActiveRecord::EVENT_BEFORE_INSERT => ['birthday'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['birthday'],
                    ],
                    'value' => function ($event) {
                        return Utils::convertDateToDBFormat($this->birthday);
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
            [['name', 'phone', 'type', 'online_sales_id', 'co_so'], 'required'],
            [['birthday'], 'safe'],
            [['fanpage_id', 'online_sales_id', 'direct_sale_id', 'co_so', 'country_id', 'province_id', 'district_id', 'ward_id'], 'integer'],
            [['code', 'name', 'sex', 'address', 'avatar', 'type', 'sale_online_note', 'direct_sale_note', 'status'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 30],
            [['sex'], 'string', 'max' => 255],
            [['co_so'], 'exist', 'skipOnError' => true, 'targetClass' => CoSo::class, 'targetAttribute' => ['co_so' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['direct_sale_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['direct_sale_id' => 'id']],
            [['online_sales_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['online_sales_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationCountry::class, 'targetAttribute' => ['country_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationProvince::class, 'targetAttribute' => ['province_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationDistrict::class, 'targetAttribute' => ['district_id' => 'id']],
            [['ward_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationWard::class, 'targetAttribute' => ['ward_id' => 'id']],
            [['fanpage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fanpage::class, 'targetAttribute' => ['fanpage_id' => 'id']],
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
            'name' => IwayModule::t('iway', 'Tên'),
            'birthday' => IwayModule::t('iway', 'Ngày sinh'),
            'sex' => IwayModule::t('iway', 'Giới tinh'),
            'phone' => IwayModule::t('iway', 'Số điện thoại'),
            'avatar' => IwayModule::t('iway', 'Avatar'),
            'fanpage_id' => IwayModule::t('iway', 'Fanpage'),
            'type' => IwayModule::t('iway', 'Loại khách hàng'),
            'online_sales_id' => IwayModule::t('iway', 'Online Sales'),
            'sale_online_note' => IwayModule::t('iway', 'Ghi chú của SalesOnline'),
            'direct_sale_id' => IwayModule::t('iway', 'Direct Sale'),
            'direct_sale_note' => IwayModule::t('iway', 'Ghi chú của DirectSales'),
            'co_so' => IwayModule::t('iway', 'Cơ sở'),
            'status' => IwayModule::t('iway', 'Tình trạng'),
            'created_at' => IwayModule::t('iway', 'Created At'),
            'created_by' => IwayModule::t('iway', 'Created By'),
            'updated_at' => IwayModule::t('iway', 'Updated At'),
            'updated_by' => IwayModule::t('iway', 'Updated By'),
            'country_id' => IwayModule::t('iway', 'Quốc gia'),
            'province_id' => IwayModule::t('iway', 'Tỉnh/thành phố'),
            'district_id' => IwayModule::t('iway', 'Quận/huyện'),
            'ward_id' => IwayModule::t('iway', 'Phường/xã'),
            'address' => IwayModule::t('iway', 'Địa chỉ'),
        ];
    }

    public function beforeSave($insert)
    {
        $this->code = self::PREFIX_CODE . '-' . $this->co_so . '-' . $this->primaryKey;
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
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

    public function getCoSo()
    {
        return $this->hasOne(CoSo::class, ['id' => 'co_so']);
    }
}
