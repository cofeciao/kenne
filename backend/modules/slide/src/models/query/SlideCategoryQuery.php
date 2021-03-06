<?php

namespace modava\slide\models\query;

use modava\slide\models\SlideCategory;

/**
 * This is the ActiveQuery class for [[SlideCategory]].
 *
 * @see SlideCategory
 */
class SlideCategoryQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([SlideCategory::tableName() . '.status' => SlideCategory::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([SlideCategory::tableName() . '.status' => SlideCategory::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([SlideCategory::tableName() . '.id' => SORT_DESC]);
    }
    public function findByLanguage()
    {
        return $this->andWhere([SlideCategory::tableName() . '.language' => \Yii::$app->language])
            ->orWhere([SlideCategory::tableName() . '.language' => '']);
    }
}
