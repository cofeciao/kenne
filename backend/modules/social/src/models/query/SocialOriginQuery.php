<?php

namespace modava\social\models\query;

use modava\social\models\SocialOrigin;

/**
 * This is the ActiveQuery class for [[SocialOrigin]].
 *
 * @see SocialOrigin
 */
class SocialOriginQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([SocialOrigin::tableName() . '.status' => SocialOrigin::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([SocialOrigin::tableName() . '.status' => SocialOrigin::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([SocialOrigin::tableName() . '.id' => SORT_DESC]);
    }
}
