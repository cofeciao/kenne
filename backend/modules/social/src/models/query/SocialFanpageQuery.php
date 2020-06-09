<?php

namespace modava\social\models\query;

use modava\social\models\SocialFanpage;

/**
 * This is the ActiveQuery class for [[SocialFanpage]].
 *
 * @see SocialFanpage
 */
class SocialFanpageQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([SocialFanpage::tableName() . '.status' => SocialFanpage::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([SocialFanpage::tableName() . '.status' => SocialFanpage::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([SocialFanpage::tableName() . '.id' => SORT_DESC]);
    }
}
