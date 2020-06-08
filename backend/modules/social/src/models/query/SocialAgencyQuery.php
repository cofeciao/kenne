<?php

namespace modava\social\models\query;

use modava\social\models\SocialAgency;

/**
 * This is the ActiveQuery class for [[SocialAgency]].
 *
 * @see SocialAgency
 */
class SocialAgencyQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([SocialAgency::tableName() . '.status' => SocialAgency::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([SocialAgency::tableName() . '.status' => SocialAgency::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([SocialAgency::tableName() . '.id' => SORT_DESC]);
    }
}
