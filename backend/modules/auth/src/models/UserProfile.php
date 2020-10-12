<?php

namespace modava\auth\models;

use modava\auth\AuthModule;
use yii\db\ActiveRecord;
use Yii;

class UserProfile extends ActiveRecord
{
    const SCENARIO_SAVE = 'save';
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_OTHER = 3;
    const GENDER = [
        self::GENDER_OTHER => 'Khác',
        self::GENDER_MALE => 'Nam',
        self::GENDER_FEMALE => 'Nữ'
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required', 'on' => self::SCENARIO_SAVE],
            [['phone'], 'required'],
            [['user_id', 'gender'], 'integer'],
            [['gender'], 'in', 'range' => self::GENDER],
            [['fullname', 'address', 'avatar', 'cover'], 'string', 'max' => 255],
            [['facebook'], 'string', 'max' => 50],
            [['birthday', 'phone'], 'string', 'max' => 25],
            [['about'], 'string'],
            [['avatar', 'cover'], 'string', 'max' => 255],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
            [['phone'], 'unique', 'targetClass' => self::class, 'targetAttribute' => 'phone', 'filter' => function ($query) {
                $query->andWhere(['not', ['user_id' => $this->getPrimaryKey()]]);
            },]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('backend', 'User ID'),
            'fullname' => Yii::t('backend', 'Họ tên'),
            'birthday' => Yii::t('backend', 'Ngày sinh'),
            'about' => Yii::t('backend', 'About me'),
            'address' => Yii::t('backend', 'Address'),
            'phone' => Yii::t('backend', 'Phone'),
            'facebook' => Yii::t('backend', 'Facebook'),
            'avatar' => Yii::t('backend', 'Avatar'),
            'cover' => Yii::t('backend', 'Cover'),
            'locale' => Yii::t('backend', 'Locale'),
            'gender' => Yii::t('backend', 'Gender'),
        ];
    }

    public function afterDelete()
    {
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserModel::class, ['id' => 'user_id']);
    }
}