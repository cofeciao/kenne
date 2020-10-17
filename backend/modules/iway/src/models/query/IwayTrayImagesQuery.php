<?php

namespace modava\iway\models\query;

use modava\iway\models\IwayTrayImages;

/**
 * This is the ActiveQuery class for [[IwayTrayImages]].
 *
 * @see IwayTrayImages
 */
class IwayTrayImagesQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([IwayTrayImages::tableName() . '.status' => IwayTrayImages::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([IwayTrayImages::tableName() . '.status' => IwayTrayImages::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([IwayTrayImages::tableName() . '.id' => SORT_DESC]);
    }
}
