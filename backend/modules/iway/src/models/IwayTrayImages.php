<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\models\table\IwayTrayImagesTable;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "iway_tray_images".
 *
 * @property int $id
 * @property int $tray_id ID tray
 * @property string $image Hình ảnh tray
 * @property int $type Loại hình ảnh: chụp thẳng, chụp trái, chụp phải,...
 * @property int $status Trạng thái đánh giá: 0 - chưa đánh giá, 1 - đạt, 2 - chưa đạt
 * @property int $created_at Thời gian chụp
 * @property string $evaluate Đánh giá của bác sĩ
 * @property int $evaluate_at Thời gian đánh giá
 * @property int $evaluate_by Bác sĩ đánh giá
 */
class IwayTrayImages extends IwayTrayImagesTable
{
    public $toastr_key = 'iway-tray-images';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']
                    ],
                    'value' => time()
                ]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tray_id', 'image', 'type'], 'required'],
            [['tray_id', 'type', 'status', 'created_at', 'evaluate_at', 'evaluate_by'], 'integer'],
            [['evaluate'], 'string'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'tray_id' => Yii::t('backend', 'Tray ID'),
            'image' => Yii::t('backend', 'Image'),
            'type' => Yii::t('backend', 'Type'),
            'status' => Yii::t('backend', 'Status'),
            'created_at' => Yii::t('backend', 'Created At'),
            'evaluate' => Yii::t('backend', 'Evaluate'),
            'evaluate_at' => Yii::t('backend', 'Evaluate At'),
            'evaluate_by' => Yii::t('backend', 'Evaluate By'),
        ];
    }


}
