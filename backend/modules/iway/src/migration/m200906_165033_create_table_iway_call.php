<?php

use yii\db\Migration;

/**
 * Class m200906_165033_create_table_iway_call
 */
class m200906_165033_create_table_iway_call extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_call');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_call', [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'customer_id' => $this->integer(11)->notNull()->comment('Khách hàng'),
                'status' => $this->string(50)->notNull()->comment('Tình trạng: plan, done'),
                'start_time' => $this->dateTime()->notNull()->comment('Ngày gọi'),

                'description' => $this->text()->null(),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_call_created_by_user', 'iway_call', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_call_updated_by_user', 'iway_call', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_call_customer_id_iway_customer_id', 'iway_call', 'customer_id', 'iway_customer', 'id', 'CASCADE', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200906_165033_create_table_iway_call cannot be reverted.\n";

        return false;
    }
}
