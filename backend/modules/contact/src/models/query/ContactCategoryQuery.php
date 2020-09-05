<?php

namespace modava\contact\models\query;

use modava\contact\models\ContactCategory;

/**
 * This is the ActiveQuery class for [[ContactCategory]].
 *
 * @see ContactCategory
 */
class ContactCategoryQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([ContactCategory::tableName() . '.status' => ContactCategory::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([ContactCategory::tableName() . '.status' => ContactCategory::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([ContactCategory::tableName() . '.id' => SORT_DESC]);
    }
}
