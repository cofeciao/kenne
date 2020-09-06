
<?php

use yii\db\Migration;

/**
 * Class m200906_165714_create_table_iway_appointment_schedule
 */
class m200906_165714_create_table_iway_appointment_schedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_appointment_schedule');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_appointment_schedule', [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'customer_id' => $this->integer(11)->notNull()->comment('Khách hàng'),
                'co_so_id' => $this->integer(11)->notNull()->comment('Cơ sở'),
                'start_time' => $this->dateTime()->notNull()->comment('Ngày hẹn'),
                'status' => $this->string(50)->notNull()->comment('Tình trạng: đặt hẹn, đến, không đến.'),
                'status_service' => $this->string(50)->notNull()->comment('Tình trạng làm dịch vụ: Đồng ý, không đồng ý'),
                'accept_for_service' => $this->string()->null()->comment('Dịch vụ chọn khi đồng ý'),
                'reason_fail' => $this->string(255)->null()->comment('Lý do không làm dịch vụ mặc dù đã đến'),
                'check_in_time' => $this->dateTime()->null()->comment('Thời gian khách đến'),

                'description' => $this->text()->null(),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_appointment_schedule_created_by_user', 'iway_appointment_schedule', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_appointment_schedule_updated_by_user', 'iway_appointment_schedule', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_appointment_schedule_customer_id_iway_customer_id', 'iway_appointment_schedule', 'customer_id', 'iway_customer', 'id', 'CASCADE', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200906_165714_create_table_iway_appointment_schedule cannot be reverted.\n";

        return false;
    }
}
