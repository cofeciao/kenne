<?php

namespace modava\iway\models\query;

use modava\iway\models\Order;

/**
 * This is the ActiveQuery class for [[Order]].
 *
 * @see Order
 */
class OrderQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Order::tableName() . '.status' => Order::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Order::tableName() . '.status' => Order::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Order::tableName() . '.id' => SORT_DESC]);
    }
}
