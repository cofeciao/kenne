<?php

namespace modava\blogs\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\blogs\BlogsModule;
use modava\blogs\models\table\BlogsTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "blogs".
*
    * @property int $id
    * @property string $image
    * @property string $title
    * @property string $descriptions
    * @property string $date
    * @property string $comments
    * @property string $search
    * @property string $recent_post
    * @property string $tags
*/
class Blogs extends BlogsTable
{
    public $toastr_key = 'blogs';
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
			[['title', 'descriptions', 'tags'], 'required'],
			[['date'], 'safe'],
			[['image', 'title', 'descriptions', 'comments', 'search', 'recent_post'], 'string', 'max' => 255],
			[['tags'], 'string', 'max' => 50],
			[['title'], 'unique'],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => BlogsModule::t('blogs', 'ID'),
            'image' => BlogsModule::t('blogs', 'Image'),
            'title' => BlogsModule::t('blogs', 'Title'),
            'descriptions' => BlogsModule::t('blogs', 'Descriptions'),
            'date' => BlogsModule::t('blogs', 'Date'),
            'comments' => BlogsModule::t('blogs', 'Comments'),
            'search' => BlogsModule::t('blogs', 'Search'),
            'recent_post' => BlogsModule::t('blogs', 'Recent Post'),
            'tags' => BlogsModule::t('blogs', 'Tags'),
        ];
    }


}
