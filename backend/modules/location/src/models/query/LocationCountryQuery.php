<?php

namespace modava\location\models\query;

use modava\location\models\LocationCountry;

/**
 * This is the ActiveQuery class for [[LocationCountry]].
 *
 * @see LocationCountry
 */
class LocationCountryQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([LocationCountry::tableName() . '.status' => LocationCountry::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([LocationCountry::tableName() . '.status' => LocationCountry::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([LocationCountry::tableName() . '.id' => SORT_DESC]);
    }
}
