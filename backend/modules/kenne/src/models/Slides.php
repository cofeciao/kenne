<?php

namespace modava\kenne\models;

use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\SlidesTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "slides".
*
    * @property int $id
    * @property string $sld_title
    * @property string $sld_description
    * @property string $sld_image
    * @property int $sld_cat_id
    * @property int $sld_status
    * @property int $created_at
    * @property int $updated_at
    *
            * @property Categories $sldCat
    */
class Slides extends SlidesTable
{

    const ACTIVE_STATUS = 1;
    const DISABLE_STATUS = 0;
    public $toastr_key = 'slides';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
			[['sld_title', 'sld_image', 'sld_cat_id','sld_type'], 'required'],
			[['sld_cat_id', 'sld_status', 'created_at', 'updated_at'], 'integer'],
			[['sld_title', 'sld_description', 'sld_image'], 'string', 'max' => 255],
			[['sld_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['sld_cat_id' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'sld_title' => KenneModule::t('kenne', 'Tiêu đề sale'),
            'sld_description' => KenneModule::t('kenne', 'Mô tả'),
            'sld_image' => KenneModule::t('kenne', 'Hình ảnh'),
            'sld_cat_id' => KenneModule::t('kenne', 'Loại sp'),
            'sld_status' => KenneModule::t('kenne', 'Trạng thái'),
            'created_at' => KenneModule::t('kenne', 'Created At'),
            'updated_at' => KenneModule::t('kenne', 'Updated At'),
            'sld_type' => KenneModule::t('kenne', 'Loại ảnh'),
        ];
    }


}
