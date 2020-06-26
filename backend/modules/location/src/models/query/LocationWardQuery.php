<?php

namespace modava\location\models\query;

use modava\location\models\LocationWard;

/**
 * This is the ActiveQuery class for [[LocationWard]].
 *
 * @see LocationWard
 */
class LocationWardQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([LocationWard::tableName() . '.status' => LocationWard::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([LocationWard::tableName() . '.status' => LocationWard::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([LocationWard::tableName() . '.id' => SORT_DESC]);
    }
}
