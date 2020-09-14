<?php

namespace modava\iway\models\query;

use modava\iway\models\CoSo;

/**
 * This is the ActiveQuery class for [[CoSo]].
 *
 * @see CoSo
 */
class CoSoQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([CoSo::tableName() . '.status' => CoSo::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([CoSo::tableName() . '.status' => CoSo::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([CoSo::tableName() . '.id' => SORT_DESC]);
    }
}
