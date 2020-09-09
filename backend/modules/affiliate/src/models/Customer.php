<?php

namespace modava\affiliate\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\affiliate\AffiliateModule;
use modava\affiliate\models\table\CustomerTable;
use modava\location\models\LocationCountry;
use modava\location\models\LocationDistrict;
use modava\location\models\LocationProvince;
use modava\location\models\LocationWard;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use modava\affiliate\helpers\Utils;

/**
 * This is the model class for table "affiliate_customer".
 *
 * @property int $id
 * @property string $slug
 * @property string $full_name Họ và tên Khách hàng
 * @property string $phone Số điện thoại - Không trùng
 * @property string $email Email khách hàng - không quan tâm trùng
 * @property string $face_customer Link facebook của KH
 * @property int $partner_id Partner tích hợp affiliate
 * @property int $partner_customer_id id Customer trên hệ thống partner
 * @property string $description Mô tả
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by Người gọi
 * @property int $updated_by
 * @property int $sex
 * @property int $total_commission Tổng tiền hoa hồng của KH
 * @property int $total_commission_paid Tổng tiền hoa hồng chi trả cho KH
 * @property int $total_commission_remain Tổng tiền hoa hồng còn lại
 * @property date $birthday
 * @property date $date_checkin
 * @property date $date_accept_do_service
 *
 * @property Coupon[] $affiliateCoupons
 * @property User $createdBy
 * @property User $updatedBy
 * @property Partner $partner
 * @property Note[] $affiliateNotes
 */
class Customer extends CustomerTable
{
    public $toastr_key = 'customer';
    const STATUS_DANG_LAM_DICH_VU = 0;
    const STATUS_HOAN_THANH_DICH_VU = 1;

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
                        return MyHelper::createAlias($this->full_name);
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
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['date_checkin'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['date_checkin'],
                    ],
                    'value' => function ($event) {
                        return Utils::convertDateToDBFormat($this->date_checkin);
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['date_accept_do_service'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['date_accept_do_service'],
                    ],
                    'value' => function ($event) {
                        return Utils::convertDateToDBFormat($this->date_accept_do_service);
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['total_commission_remain'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['total_commission_remain'],
                    ],
                    'value' => function ($event) {
                        return $this->total_commission - $this->total_commission_paid;
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
            [['full_name', 'phone', 'partner_id', 'partner_customer_id', 'status'], 'required'],
            [['partner_id', 'sex', 'partner_customer_id', 'country_id', 'province_id', 'district_id', 'ward_id'], 'integer'],
            [['description', 'address'], 'string'],
            [['full_name', 'email', 'face_customer'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['slug', 'partner_customer_id', 'phone'], 'unique'],
            [['email'], 'email'],
            [['total_commission', 'total_commission_paid', 'total_commission_remain'], 'number'],
            [['birthday', 'date_accept_do_service', 'date_checkin'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::class, 'targetAttribute' => ['partner_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationCountry::class, 'targetAttribute' => ['country_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationProvince::class, 'targetAttribute' => ['province_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationDistrict::class, 'targetAttribute' => ['district_id' => 'id']],
            [['ward_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationWard::class, 'targetAttribute' => ['ward_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'slug' => Yii::t('backend', 'Slug'),
            'full_name' => Yii::t('backend', 'Full Name'),
            'phone' => Yii::t('backend', 'Phone'),
            'email' => Yii::t('backend', 'Email'),
            'face_customer' => Yii::t('backend', 'Face Customer'),
            'partner_id' => Yii::t('backend', 'Partner ID'),
            'description' => Yii::t('backend', 'Description'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'birthday' => Yii::t('backend', 'Birthday'),
            'sex' => Yii::t('backend', 'Sex'),
            'partner_customer_id' => Yii::t('backend', 'Partner Customer Id'),
            'date_accept_do_service' => Yii::t('backend', 'Date Accept Do Service'),
            'date_checkin' => Yii::t('backend', 'Date Checkin'),
            'country_id' => Yii::t('backend', 'Country'),
            'province_id' => Yii::t('backend', 'Province'),
            'district_id' => Yii::t('backend', 'District'),
            'ward_id' => Yii::t('backend', 'Ward'),
            'address' => Yii::t('backend', 'Address'),
            'status' => Yii::t('backend', 'Customer Status'),
            'total_commission' => Yii::t('backend', 'Tổng hoa hồng'),
            'total_commission_paid' => Yii::t('backend', 'Tổng hoa hồng đã trả cho KH'),
            'total_commission_remain' => Yii::t('backend', 'Tổng hoa hồng còn lại'),
        ];
    }

    public static function totalConvert($type)
    {
        $sql = "SELECT status, COUNT(*) AS count
                FROM `affiliate_customer`";

        switch ($type) {
            case 'year':
                $sql .= "WHERE YEAR(FROM_UNIXTIME(created_at, '%Y-%m-%d')) = YEAR(CURRENT_DATE())
                        GROUP BY status;";
                break;
            case 'month':
                $sql .= "WHERE MONTH(FROM_UNIXTIME(created_at, '%Y-%m-%d')) = MONTH(CURRENT_DATE()) 
                            AND YEAR(FROM_UNIXTIME(created_at, '%Y-%m-%d')) = YEAR(CURRENT_DATE())
                        GROUP BY status;";
                break;
            case 'week':
                $sql .= "WHERE YEARWEEK(FROM_UNIXTIME(created_at, '%Y-%m-%d')) = YEARWEEK(CURRENT_DATE()) 
                         GROUP BY status;";
                break;
        }

        $allRecord = \Yii::$app->db->createCommand($sql)->queryAll();
        $recordForChart = [];
        $total = 0;

        foreach ($allRecord as $record) {
            $recordForChart[] = [
                'name' => \Yii::$app->getModule('affiliate')->params['customer_status'][$record['status']],
                'value' => $record['count']
            ];
            $total += (int)$record['count'];
        }

        return [
            'total' => $total,
            'data' => $recordForChart,
            'color' => \Yii::$app->getModule('affiliate')->params['customer_status_color'],
        ];
    }


    public static function getCustomerByKeyWord($keyWord)
    {
        $sql = 'SELECT `id`, concat(full_name, " - ", phone) AS `text` FROM `affiliate_customer` WHERE full_name LIKE :q OR phone LIKE :q';

        $data = Yii::$app->db->createCommand($sql, [':q' => "%{$keyWord}%"])->queryAll();

        return [
            'results' => $data
        ];
    }
}
