<?php

namespace modava\iway\models\query;

use modava\iway\models\AppointmentSchedule;

/**
 * This is the ActiveQuery class for [[AppointmentSchedule]].
 *
 * @see AppointmentSchedule
 */
class AppointmentScheduleQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([AppointmentSchedule::tableName() . '.status' => AppointmentSchedule::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([AppointmentSchedule::tableName() . '.status' => AppointmentSchedule::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([AppointmentSchedule::tableName() . '.id' => SORT_DESC]);
    }
}
