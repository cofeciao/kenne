<?php

namespace modava\kenne\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\ContactsTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "contacts".
*
    * @property int $id
    * @property string $con_name
    * @property string $con_email
    * @property string $con_subject
    * @property string $con_content
    * @property string $con_status
    * @property int $created_at
*/
class Contacts extends ContactsTable
{
    public $toastr_key = 'contacts';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['con_name'], 'required'],
			[['created_at'], 'integer'],
			[['con_name'], 'string', 'max' => 35],
			[['con_email', 'con_subject', 'con_content', 'con_status'], 'string', 'max' => 255],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'con_name' => KenneModule::t('kenne', 'Con Name'),
            'con_email' => KenneModule::t('kenne', 'Con Email'),
            'con_subject' => KenneModule::t('kenne', 'Con Subject'),
            'con_content' => KenneModule::t('kenne', 'Con Content'),
            'con_status' => KenneModule::t('kenne', 'Con Status'),
            'created_at' => KenneModule::t('kenne', 'Created At'),
        ];
    }


}
