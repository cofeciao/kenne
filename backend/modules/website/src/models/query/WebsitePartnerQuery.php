<?php

namespace modava\website\models\query;

use modava\website\models\WebsitePartner;

/**
 * This is the ActiveQuery class for [[WebsitePartner]].
 *
 * @see WebsitePartner
 */
class WebsitePartnerQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([WebsitePartner::tableName() . '.status' => WebsitePartner::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([WebsitePartner::tableName() . '.status' => WebsitePartner::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([WebsitePartner::tableName() . '.id' => SORT_DESC]);
    }
}
