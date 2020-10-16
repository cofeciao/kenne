<?php

namespace modava\kenne\models\query;

use modava\kenne\models\Account;

/**
 * This is the ActiveQuery class for [[Account]].
 *
 * @see Account
 */
class AccountQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Account::tableName() . '.status' => Account::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Account::tableName() . '.status' => Account::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Account::tableName() . '.id' => SORT_DESC]);
    }
}
