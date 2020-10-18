<?php

namespace frontend\models;

use modava\kenne\models\table\BlogsTable;

class Blogs extends BlogsTable
{
    public function getAllBLogsRecord()
    {
        return self::find()
            ->where(['status' => self::ACTIVE_STATUS]);
    }

    public function getOneBLogDetail($id)
    {
        return self::find()
            ->where(['id' => $id])
            ->one();

    }

    public function getAllRecentPost()
    {
         $data = self::find()
            ->where(['status' => self::ACTIVE_STATUS])
            ->limit(5)
            ->orderBy(['date' => SORT_DESC])
            ->all();
        return $data;
    }

    public function getAllTags()
    {
        return self::find()
            ->where(['status' => self::ACTIVE_STATUS])
            ->select(['tags'])
            ->distinct()
            ->all();
    }

    public function getAllPagination($query)
    {
        $dataProvider =  new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize = 6,
                'totalCount'=> $query->count(),
            ]
        ]);
        return $dataProvider;
    }

    public function Search($param)
    {

            $query = self::find()->andFilterWhere(['like','title',$param]);
            return $query;
    }
}