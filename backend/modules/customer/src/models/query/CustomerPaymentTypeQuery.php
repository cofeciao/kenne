<?php

namespace modava\customer\models\query;

use modava\customer\models\CustomerPaymentType;

/**
 * This is the ActiveQuery class for [[CustomerPaymentType]].
 *
 * @see CustomerPaymentType
 */
class CustomerPaymentTypeQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([CustomerPaymentType::tableName() . '.status' => CustomerPaymentType::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([CustomerPaymentType::tableName() . '.status' => CustomerPaymentType::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([CustomerPaymentType::tableName() . '.id' => SORT_DESC]);
    }
}
