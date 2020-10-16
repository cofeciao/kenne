<?php


namespace frontend\models;


use modava\kenne\models\table\SubcribesTable;
use yii\db\ActiveRecord;

class Subcribes extends SubcribesTable
{
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

    public function getSubcribeByEmail($name){
        $query = self::find()
            ->where(['sub_email'=>$name]);
        return $query;
    }
}