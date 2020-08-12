<?php

namespace modava\slide\models\query;

use modava\slide\models\Slide;

/**
 * This is the ActiveQuery class for [[Slide]].
 *
 * @see Slide
 */
class SlideQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Slide::tableName() . '.status' => Slide::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Slide::tableName() . '.status' => Slide::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Slide::tableName() . '.id' => SORT_DESC]);
    }
}
