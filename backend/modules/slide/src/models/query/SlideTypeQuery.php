<?php

namespace modava\slide\models\query;

use modava\slide\models\SlideType;

/**
 * This is the ActiveQuery class for [[SlideType]].
 *
 * @see SlideType
 */
class SlideTypeQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([SlideType::tableName() . '.status' => SlideType::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([SlideType::tableName() . '.status' => SlideType::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([SlideType::tableName() . '.id' => SORT_DESC]);
    }
}
