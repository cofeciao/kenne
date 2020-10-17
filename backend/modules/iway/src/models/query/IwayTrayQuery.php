<?php

namespace modava\iway\models\query;

use modava\iway\models\IwayTray;

/**
 * This is the ActiveQuery class for [[IwayTray]].
 *
 * @see IwayTray
 */
class IwayTrayQuery extends \yii\db\ActiveQuery
{
    public function sortDescById()
    {
        return $this->orderBy([IwayTray::tableName() . '.id' => SORT_DESC]);
    }
}
