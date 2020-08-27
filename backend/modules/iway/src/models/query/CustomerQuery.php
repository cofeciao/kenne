<?php

namespace modava\iway\models\query;

use modava\iway\models\Customer;

/**
 * This is the ActiveQuery class for [[Customer]].
 *
 * @see Customer
 */
class CustomerQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Customer::tableName() . '.status' => Customer::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Customer::tableName() . '.status' => Customer::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Customer::tableName() . '.id' => SORT_DESC]);
    }
}
