<?php

namespace modava\iway\models\query;

use modava\iway\models\TreatmentSchedule;

/**
 * This is the ActiveQuery class for [[TreatmentSchedule]].
 *
 * @see TreatmentSchedule
 */
class TreatmentScheduleQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([TreatmentSchedule::tableName() . '.status' => TreatmentSchedule::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([TreatmentSchedule::tableName() . '.status' => TreatmentSchedule::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([TreatmentSchedule::tableName() . '.id' => SORT_DESC]);
    }
}
