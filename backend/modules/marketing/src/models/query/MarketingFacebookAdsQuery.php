<?php

namespace modava\marketing\models\query;

use modava\marketing\models\MarketingFacebookAds;

/**
 * This is the ActiveQuery class for [[MarketingFacebookAds]].
 *
 * @see MarketingFacebookAds
 */
class MarketingFacebookAdsQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([MarketingFacebookAds::tableName() . '.status' => MarketingFacebookAds::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([MarketingFacebookAds::tableName() . '.status' => MarketingFacebookAds::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([MarketingFacebookAds::tableName() . '.id' => SORT_DESC]);
    }
}
