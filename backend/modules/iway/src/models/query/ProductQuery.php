<?php

namespace modava\iway\models\query;

use modava\iway\models\Product;

/**
 * This is the ActiveQuery class for [[Product]].
 *
 * @see Product
 */
class ProductQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Product::tableName() . '.status' => Product::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Product::tableName() . '.status' => Product::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Product::tableName() . '.id' => SORT_DESC]);
    }
}
