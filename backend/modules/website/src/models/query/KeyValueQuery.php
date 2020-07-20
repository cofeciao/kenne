<?php

namespace modava\website\models\query;

use modava\website\models\KeyValue;

/**
 * This is the ActiveQuery class for [[ProductCategory]].
 *
 * @see ProductCategoryQuery
 */
class KeyValueQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([KeyValue::tableName() . '.status' => KeyValue::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([KeyValue::tableName() . '.status' => KeyValue::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy(['id' => SORT_DESC]);
    }
}
