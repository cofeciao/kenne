<?php

namespace modava\location\models\query;

use modava\location\models\LocationDistrict;

/**
 * This is the ActiveQuery class for [[LocationDistrict]].
 *
 * @see LocationDistrict
 */
class LocationDistrictQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([LocationDistrict::tableName() . '.status' => LocationDistrict::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([LocationDistrict::tableName() . '.status' => LocationDistrict::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([LocationDistrict::tableName() . '.id' => SORT_DESC]);
    }
}
