<?php

use yii\db\Migration;

/**
 * Class m200906_170704_create_table_iway_co_so
 */
class m200906_170704_create_table_iway_co_so extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_co_so');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_co_so', [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'status' => $this->smallInteger(1)->comment('Tình trạng: Hoạt động, Không hoạt động'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_co_so_created_by_user', 'iway_co_so', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_co_so_updated_by_user', 'iway_co_so', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

            $this->addForeignKey('fk_iway_customer_co_so_id_iway_co_so_id', 'iway_customer', 'co_so_id', 'iway_co_so', 'id');
            $this->addForeignKey('fk_iway_appointment_schedule_co_so_id_iway_co_so_id', 'iway_appointment_schedule', 'co_so_id', 'iway_co_so', 'id');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200906_170704_create_table_iway_co_so cannot be reverted.\n";

        return false;
    }
}
