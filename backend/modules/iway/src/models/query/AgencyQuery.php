<?php

namespace modava\iway\models\query;

use modava\iway\models\Agency;

/**
 * This is the ActiveQuery class for [[Agency]].
 *
 * @see Agency
 */
class AgencyQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Agency::tableName() . '.status' => Agency::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Agency::tableName() . '.status' => Agency::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Agency::tableName() . '.id' => SORT_DESC]);
    }
}
