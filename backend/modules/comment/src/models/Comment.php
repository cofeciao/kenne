<?php

namespace modava\comment\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\comment\CommentModule;
use modava\comment\models\table\CommentTable;
use yii\base\Exception;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $table_name Comment cho bảng nào
 * @property int $table_id Comment cho dòng nào
 * @property string $comment Nội dung comment
 * @property int $created_at
 * @property int $created_by
 *
 * @property User $createdBy
 */
class Comment extends CommentTable
{
    public $toastr_key = 'comment';

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
            [['table_name', 'table_id', 'comment'], 'required'],
            [['table_id', 'created_at', 'created_by'], 'integer'],
            [['table_name', 'comment'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'table_name' => Yii::t('backend', 'Table Name'),
            'table_id' => Yii::t('backend', 'Table ID'),
            'comment' => Yii::t('backend', 'Comment'),
            'created_at' => Yii::t('backend', 'Created At'),
            'created_by' => Yii::t('backend', 'Created By'),
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

}
