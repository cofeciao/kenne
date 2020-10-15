<?php

use yii\db\Migration;

/**
 * Class m201015_030649_create_table_iway_treatment_schedule
 */
class m201015_030649_create_table_iway_treatment_schedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_treatment_schedule');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_treatment_schedule', [
                'id' => $this->primaryKey(),
                'title' => $this->string(255)->notNull()->comment('Tiêu đề'),
                'status' => $this->string(50)->notNull()->comment('Tình trạng'),
                'order_id' => $this->integer(11)->null()->comment('Đơn hàng'),
                'description' => $this->text()->null()->comment('Mô tả'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_treatment_schedule_created_by_user', 'iway_treatment_schedule', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_treatment_schedule_updated_by_user', 'iway_treatment_schedule', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_treatment_schedule_order_id_order_id', 'iway_treatment_schedule', 'order_id', 'iway_order', 'id', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201015_030649_create_table_iway_treatment_schedule cannot be reverted.\n";

        return false;
    }

}
