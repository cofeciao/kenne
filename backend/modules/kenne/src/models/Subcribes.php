<?php

namespace modava\kenne\models;

use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\SubcribesTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "subcribes".
*
    * @property int $id
    * @property string $sub_email
    * @property int $sub_status
    * @property int $created_at
    * @property int $updated_at
*/
class Subcribes extends SubcribesTable
{
    public $toastr_key = 'subcribes';

    public function getAllSubcribes(){
        $query = self::find()->select('sub_email');
        return $query->all();
    }

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
			[['sub_email'], 'required'],
			[['sub_status', 'created_at', 'updated_at'], 'integer'],
			[['sub_email'], 'string', 'max' => 30],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'sub_email' => KenneModule::t('kenne', 'Email'),
            'sub_status' => KenneModule::t('kenne', 'Trạng thái'),
            'created_at' => KenneModule::t('kenne', 'Created At'),
            'updated_at' => KenneModule::t('kenne', 'Updated At'),
        ];
    }


}
