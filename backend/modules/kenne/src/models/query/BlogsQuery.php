<?php

namespace modava\kenne\models\query;

use modava\kenne\models\Blogs;

/**
 * This is the ActiveQuery class for [[Blogs]].
 *
 * @see Blogs
 */
class BlogsQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Blogs::tableName() . '.status' => Blogs::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Blogs::tableName() . '.status' => Blogs::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Blogs::tableName() . '.id' => SORT_DESC]);
    }
}
