<?php

namespace modava\iway\models\query;

use modava\iway\models\Fanpage;

/**
 * This is the ActiveQuery class for [[Fanpage]].
 *
 * @see Fanpage
 */
class FanpageQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Fanpage::tableName() . '.status' => Fanpage::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Fanpage::tableName() . '.status' => Fanpage::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Fanpage::tableName() . '.id' => SORT_DESC]);
    }
}
