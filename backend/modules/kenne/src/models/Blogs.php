<?php

namespace modava\kenne\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\BlogsTable;
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
    * @property int $status
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

    public  $file;
    public function rules()
    {
        return [
            [['title', 'descriptions', 'tags'], 'required'],
            [['title', 'descriptions', 'comments', 'search', 'recent_post'], 'string', 'max' => 255],
            [['tags'], 'string', 'max' => 50],
            [['title'], 'unique'],
            [['file'],'file','extensions' => 'png,jpg' ,'maxFiles' => 4],
            [['status'], 'integer'],
            [['image'], 'safe'],
            [['link'], 'string' , 'max' => 255]
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'image' => KenneModule::t('kenne', 'Image'),
            'title' => KenneModule::t('kenne', 'Title'),
            'descriptions' => KenneModule::t('kenne', 'Descriptions'),
            'date' => KenneModule::t('kenne', 'Date'),
            'comments' => KenneModule::t('kenne', 'Comments'),
            'status' => KenneModule::t('kenne', 'Status'),
            'search' => KenneModule::t('kenne', 'Search'),
            'recent_post' => KenneModule::t('kenne', 'Recent Post'),
            'tags' => KenneModule::t('kenne', 'Tags'),
        ];
    }

}
