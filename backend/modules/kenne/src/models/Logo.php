<?php

namespace modava\kenne\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\LogoTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "logo".
*
    * @property int $id
    * @property string $logo
    * @property string $link_logo
    * @property string $title
*/
class Logo extends LogoTable
{
    public $toastr_key = 'logo';
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
    public $file;
    public function rules()
    {
        return [
			[['logo'], 'required'],
			[['logo', 'link_logo', 'title'], 'string', 'max' => 255],
            [['file'],'file','extensions' => 'png,jpg'],
            [['status'] ,  'integer']
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'logo' => KenneModule::t('kenne', 'Logo'),
            'link_logo' => KenneModule::t('kenne', 'Link Logo'),
            'title' => KenneModule::t('kenne', 'Title'),
        ];
    }


}
