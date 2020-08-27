<?php

namespace modava\iway\models\query;

use modava\iway\models\Origin;

/**
 * This is the ActiveQuery class for [[Origin]].
 *
 * @see Origin
 */
class OriginQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Origin::tableName() . '.status' => Origin::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Origin::tableName() . '.status' => Origin::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Origin::tableName() . '.id' => SORT_DESC]);
    }
}
