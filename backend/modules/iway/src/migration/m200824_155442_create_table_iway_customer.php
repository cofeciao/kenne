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
                'sex' => $this->string()->null(),
                'phone' => $this->string(30)->notNull(),
                'address' => $this->string(255)->null(),
                'country_id' => $this->integer(11)->null()->comment('Quốc gia'),
                'province_id' => $this->integer(11)->null()->comment('Tỉnh/Thành phố'),
                'district_id' => $this->integer(11)->null()->comment('Quận/Huyện'),
                'ward_id' => $this->integer(11)->null()->comment('Phường/Xã'),
                'avatar' => $this->string(255)->null(),
                'fanpage_id' => $this->integer(11)->null(),
                'type' => $this->string()->notNull()->comment('Chưa xác định - Khách online - Khách vãng lai ... '),
                'online_sales' => $this->integer(11)->notNull()->comment('Sales Online'),
                'sale_online_note' => $this->text()->null()->comment('Ghi chú của Sales Online'),
                'direct_sale_id' => $this->integer(11)->null()->comment('Direct Sale phụ trách'),
                'direct_sale_note' => $this->text()->null()->comment('Ghi chú của Direct Sale'),
                'co_so' => $this->integer(11)->null(),
                'status' => $this->string()->null()->comment('Tình trạng khách hàng'),

                /*'status_call' => $this->string()->null()->comment('KBM - Fail - Đặt hẹn'),
                'status_fail' => $this->string()->null()->comment('Tiềm năng - Ở xa - Có con nhỏ ...'),
                'status_dat_hen' => $this->string()->null()->comment('Đặt hẹn đến - Đặt hẹn không đến'),
                'status_dong_y' => $this->string()->null()->comment('Đồng ý - Không đồng ý - Làm dịch vụ khác'),
                'remind_call_time' => $this->integer()->null()->comment('Khi nào nên gọi lại.'),
                'time_lich_hen' => $this->integer(11)->null()->comment('Thời gian lịch hẹn'),
                'time_come' => $this->integer(11)->null()->comment('Thời gian khách đến'),*/

                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);
            $this->addForeignKey('fk_iway_fanpage_id_customer_fanpage', 'iway_customer', 'fanpage_id', 'customer_fanpage', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_online_sales_user', 'iway_customer', 'online_sales', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_direct_sale_user', 'iway_customer', 'direct_sale_id', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_co_so_customer_co_so', 'iway_customer', 'co_so', 'customer_co_so', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_created_by_user', 'iway_customer', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_updated_by_user', 'iway_customer', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer__country_id-location_country__id', 'iway_customer', 'country_id', 'location_country', 'id');
            $this->addForeignKey('fk_iway_customer__province_id-location_province__id', 'iway_customer', 'province_id', 'location_province', 'id');
            $this->addForeignKey('fk_iway_customer__district_id-location_district__id', 'iway_customer', 'district_id', 'location_district', 'id');
            $this->addForeignKey('fk_iway_customer__ward_id-location_ward__id', 'iway_customer', 'ward_id', 'location_ward', 'id');
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
