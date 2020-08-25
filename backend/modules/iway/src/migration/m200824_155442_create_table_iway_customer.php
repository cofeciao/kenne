<?php

use yii\db\Migration;

/**
 * Class m200824_155442_create_table_iway_customer
 */
class m200824_155442_create_table_iway_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_customer');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_customer', [
                'id' => $this->primaryKey(),
                'code' => $this->string(255)->null(),
                'name' => $this->string(255)->notNull(),
                'birthday' => $this->date()->null(),
                'sex' => $this->tinyInteger(1)->defaultValue(0)->comment('0: nữ, 1: nam'),
                'phone' => $this->string(30)->notNull(),
                'address' => $this->string(255)->null(),
                'ward' => $this->integer(11)->null(),
                'avatar' => $this->string(255)->null(),
                'fanpage_id' => $this->integer(11)->null(),
                'permission_user' => $this->integer(11)->notNull()->comment('Quyền thuộc về nhân viên nào'),
                'type' => $this->string()->notNull()->comment('Chưa xác định - Khách online - Khách vãng lai ... '),
                'status_call' => $this->string()->null()->comment('KBM - Fail - Đặt hẹn'),
                'status_fail' => $this->string()->null()->comment('Tiềm năng - Ở xa - Có con nhỏ ...'),
                'status_dat_hen' => $this->string()->null()->comment('Đặt hẹn đến - Đặt hẹn không đến'),
                'status_dong_y' => $this->string()->null()->comment('Đồng ý - Không đồng ý - Làm dịch vụ khác'),
                'remind_call_time' => $this->integer()->null()->comment('Khi nào nên gọi lại.'),
                'time_lich_hen' => $this->integer(11)->null()->comment('Thời gian lịch hẹn'),
                'time_come' => $this->integer(11)->null()->comment('Thời gian khách đến'),
                'direct_sale' => $this->integer(11)->null()->comment('Direct Sale phụ trách'),
                'co_so' => $this->integer(11)->null(),
                'sale_online_note' => $this->string(255)->null()->comment('Ghi chú của Sales Online'),
                'direct_sale_note' => $this->string(255)->null()->comment('Ghi chú của Direct Sale'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);
            $this->addForeignKey('fk_iway_customer_ward_location_ward', 'iway_customer', 'ward', 'location_ward', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_fanpage_id_customer_fanpage', 'iway_customer', 'fanpage_id', 'customer_fanpage', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_permission_user_user', 'iway_customer', 'permission_user', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_direct_sale_user', 'iway_customer', 'direct_sale', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_co_so_customer_co_so', 'iway_customer', 'co_so', 'customer_co_so', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_created_by_user', 'iway_customer', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_updated_by_user', 'iway_customer', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200824_155442_create_table_iway_customer cannot be reverted.\n";

        return false;
    }
}
