<?php

use yii\db\Migration;

/**
 * Class m201003_085332_add_dropdown_config
 */
class m201003_085332_add_dropdown_config extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("UPDATE `dropdowns_config` SET `dropdown_value` = '[{\"key\": \"dat_hen\", \"value\": \"Đặt hẹn\"}, {\"key\": \"den\", \"value\": \"Đến\"}, {\"key\": \"khong_den\", \"value\": \"Không đến\"}, {\"key\": \"doi_lich\", \"value\": \"Dời lịch\"}]' WHERE `field_name` = 'status' AND table_name = 'iway_appointment_schedule';
");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201003_085332_add_dropdown_config cannot be reverted.\n";

        return false;
    }
}
