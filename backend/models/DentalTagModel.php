<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Tran
 * Date: 08-04-2019
 * Time: 02:53 PM
 */

namespace backend\models;

use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class DentalTagModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'dep365_customer_online_dental_tag';
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ],
                'value' => time()
            ]
        ];
    }

    public function rules()
    {
        return [
            [['customer_id', 'tag', 'ketqua_thamkham'], 'required'],
            [['customer_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['tag'], 'string', 'max' => 50],
            [['ketqua_thamkham'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'customer_id' => \Yii::t('backend', 'Khách hàng'),
            'tag' => \Yii::t('backend', 'Tag'),
            'ketqua_thamkham' => \Yii::t('backend', 'Kết quả thăm khám'),
        ];
    }
}
