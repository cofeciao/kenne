<?php


namespace frontend\models;


use modava\kenne\models\table\SlidesTable;

class Slides extends SlidesTable
{
    public function getAllSlides(){
        $query = self::find()->all();
        return $query;
    }

    public function getCategoryById($id)
    {
        $query = Categories::find($id)->one();
        return $query;
    }

    public function getNameCategory()
    {
        return $this->hasOne(Categories::className(),['id'=>'sld_cat_id'])->select(['cat_name','cat_slug']);
    }

}