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
                'fullname' => $this->string(255)->notNull(),
                'avatar' => $this->string(255)->null(),
                'phone' => $this->string(30)->notNull(),
                'sex' => $this->string()->null(),
                'birthday' => $this->date()->null(),
                'address' => $this->string(255)->null(),
                'province_id' => $this->integer(11)->null()->comment('Tỉnh/Thành phố'),
                'district_id' => $this->integer(11)->null()->comment('Quận/Huyện'),
                'ward_id' => $this->integer(11)->null()->comment('Phường/Xã'),
                'online_source' => $this->string(50)->null()->comment('Nguồn online'),
                'fb_fanpage' => $this->string(255)->null()->comment('Nếu khách đến từ nguồn FB, thì đến từ Fanpage nào'),
                'fb_customer' => $this->string(255)->null()->comment('Nếu khách đến từ nguồn FB, thì fb của khách là gì'),
                'online_sales_id' => $this->integer(11)->notNull()->comment('Sales Online Tư vấn'),
                'online_sales_note' => $this->text()->null()->comment('Ghi chú của Sales Online'),
                'direct_sales_id' => $this->integer(11)->null()->comment('Direct Sale phụ trách'),
                'direct_sales_note' => $this->text()->null()->comment('Ghi chú của Direct Sale'),
                'status_customer' => $this->string(50)->null()->comment('Tình trạng khách hàng: Đặt hẹn, Chờ chăm sóc lại, Fail'),
                'co_so_id' => $this->integer(11)->notNull()->comment('Cơ sở'),
                'reason_fail' => $this->string(255)->null()->comment('lý do fail'),
                'who_created' => $this->string(50)->null()->comment('Người tạo: Lễ tân, Online, Direct, Khác'),

                'description' => $this->text()->null(),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_customer_online_sales_id_user', 'iway_customer', 'online_sales_id', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_directs_sale_user', 'iway_customer', 'direct_sales_id', 'user', 'id', 'RESTRICT', 'CASCADE');

            $this->addForeignKey('fk_iway_customer_created_by_user', 'iway_customer', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_updated_by_user', 'iway_customer', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

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
