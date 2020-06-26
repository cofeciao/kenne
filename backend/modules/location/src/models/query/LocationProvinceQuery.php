<?php

namespace modava\location\models\query;

use modava\location\models\LocationProvince;

/**
 * This is the ActiveQuery class for [[LocationProvince]].
 *
 * @see LocationProvince
 */
class LocationProvinceQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([LocationProvince::tableName() . '.status' => LocationProvince::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([LocationProvince::tableName() . '.status' => LocationProvince::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([LocationProvince::tableName() . '.id' => SORT_DESC]);
    }
}
