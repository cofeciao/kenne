<?php

namespace modava\contact\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\contact\ContactModule;
use modava\contact\models\table\ContactTable;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $fullname
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $title
 * @property string $content
 * @property string $ip_address
 * @property int $status
 * @property int $created_at
 */
class Contact extends ContactTable
{
    public $toastr_key = 'contact';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'preserveNonEmptyValues' => true,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
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
            [['fullname', 'phone'], 'required'],
            [['content'], 'string'],
            [['status', 'created_at'], 'integer'],
            [['fullname', 'email', 'address', 'title'], 'string', 'max' => 255],
            [['phone', 'ip_address'], 'string', 'max' => 25],
            [['phone'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => ContactModule::t('contact', 'ID'),
            'fullname' => ContactModule::t('contact', 'Fullname'),
            'phone' => ContactModule::t('contact', 'Phone'),
            'email' => ContactModule::t('contact', 'Email'),
            'address' => ContactModule::t('contact', 'Address'),
            'title' => ContactModule::t('contact', 'Title'),
            'content' => ContactModule::t('contact', 'Content'),
            'ip_address' => ContactModule::t('contact', 'Ip Address'),
            'status' => ContactModule::t('contact', 'Status'),
            'created_at' => ContactModule::t('contact', 'Created At'),
        ];
    }


}
