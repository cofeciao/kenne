<?php

use yii\db\Migration;

/**
 * Class m201003_091113_modify_table_iway_appointment_schedule
 */
class m201003_091113_modify_table_iway_appointment_schedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('iway_appointment_schedule', 'new_appointment_schedule_id', $this->integer(11)->null()->comment('Lịch hẹn mới'));
        $this->addForeignKey('fk_iway_as_new_id_iway_as_id', 'iway_appointment_schedule', 'new_appointment_schedule_id', 'iway_appointment_schedule', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201003_091113_modify_table_iway_appointment_schedule cannot be reverted.\n";

        return false;
    }
}
