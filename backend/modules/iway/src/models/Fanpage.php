<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\IwayModule;
use modava\iway\models\table\FanpageTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "iway_fanpage".
*
    * @property int $id
    * @property int $origin_id
    * @property string $name
    * @property string $description
    * @property string $url_page
    * @property int $status
    * @property string $language Language
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property User $createdBy
            * @property Origin $origin
            * @property User $updatedBy
    */
class Fanpage extends FanpageTable
{
    public $toastr_key = 'fanpage';
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
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['origin_id', 'name'], 'required'],
			[['origin_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['description', 'language'], 'string'],
			[['name', 'url_page'], 'string', 'max' => 255],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
			[['origin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Origin::class, 'targetAttribute' => ['origin_id' => 'id']],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => IwayModule::t('iway', 'ID'),
            'origin_id' => IwayModule::t('iway', 'Origin ID'),
            'name' => IwayModule::t('iway', 'Name'),
            'description' => IwayModule::t('iway', 'Description'),
            'url_page' => IwayModule::t('iway', 'Url Page'),
            'status' => IwayModule::t('iway', 'Status'),
            'language' => IwayModule::t('iway', 'Language'),
            'created_at' => IwayModule::t('iway', 'Created At'),
            'updated_at' => IwayModule::t('iway', 'Updated At'),
            'created_by' => IwayModule::t('iway', 'Created By'),
            'updated_by' => IwayModule::t('iway', 'Updated By'),
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

    public static function findByName($name) {
        $record = Yii::$app->db->createCommand(
            "SELECT `id`, `name` AS `text` FROM `iway_fanpage` WHERE `name` LIKE '%$name%' AND status = 1"
        )->queryAll();
        return $record;
    }

    public function getOrigin()
    {
        return $this->hasOne(Origin::class, ['id' => 'origin_id']);
    }
}
