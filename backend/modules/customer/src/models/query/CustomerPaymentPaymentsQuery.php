<?php

namespace modava\customer\models\query;

use modava\customer\models\CustomerPaymentPayments;

/**
 * This is the ActiveQuery class for [[CustomerPaymentPayments]].
 *
 * @see CustomerPaymentPayments
 */
class CustomerPaymentPaymentsQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([CustomerPaymentPayments::tableName() . '.status' => CustomerPaymentPayments::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([CustomerPaymentPayments::tableName() . '.status' => CustomerPaymentPayments::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([CustomerPaymentPayments::tableName() . '.id' => SORT_DESC]);
    }
}
