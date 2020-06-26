<?php

namespace modava\settings\models\query;

use modava\settings\models\SettingCoSo;

/**
 * This is the ActiveQuery class for [[SettingCoSo]].
 *
 * @see SettingCoSo
 */
class SettingCoSoQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([SettingCoSo::tableName() . '.status' => SettingCoSo::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([SettingCoSo::tableName() . '.status' => SettingCoSo::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([SettingCoSo::tableName() . '.id' => SORT_DESC]);
    }
}
