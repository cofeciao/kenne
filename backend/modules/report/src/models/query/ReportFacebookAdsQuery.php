<?php

namespace modava\report\models\query;

use modava\report\models\ReportFacebookAds;

/**
 * This is the ActiveQuery class for [[ReportFacebookAds]].
 *
 * @see ReportFacebookAds
 */
class ReportFacebookAdsQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([ReportFacebookAds::tableName() . '.status' => ReportFacebookAds::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([ReportFacebookAds::tableName() . '.status' => ReportFacebookAds::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([ReportFacebookAds::tableName() . '.id' => SORT_DESC]);
    }
}
