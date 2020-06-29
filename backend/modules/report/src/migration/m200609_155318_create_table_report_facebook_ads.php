<?php

use yii\db\Migration;

/**
 * Class m200609_155318_create_table_report_facebook_ads
 */
class m200609_155318_create_table_report_facebook_ads extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $check_report_fb_ads = Yii::$app->db->getTableSchema('report_facebook_ads');
        if ($check_report_fb_ads === null) {
            $this->createTable('report_facebook_ads', [
                'id' => $this->primaryKey(),
                'don_vi' => $this->integer(11)->null(),
                'so_tien_chay' => $this->string(25)->notNull(),
                'hien_thi' => $this->integer(11)->null(),
                'tiep_can' => $this->integer(11)->null(),
                'binh_luan' => $this->integer(11)->null(),
                'tin_nhan' => $this->integer(11)->null(),
                'page_chay' => $this->integer(11)->null(),
                'location_id' => $this->integer(11)->null(),
                'san_pham' => $this->integer(11)->null(),
                'tuong_tac' => $this->integer(11)->null()->defaultValue(0),
                'so_dien_thoai' => $this->integer(11)->null()->defaultValue(0),
                'goi_duoc' => $this->integer(11)->null()->defaultValue(0),
                'lich_hen' => $this->integer(11)->null()->defaultValue(0),
                'khach_den' => $this->integer(11)->null()->defaultValue(0),
                'ngay_chay' => $this->integer(11)->null()->defaultValue(0),
                'money_hienthi' => $this->float()->null()->defaultValue(0),
                'money_tiepcan' => $this->float()->null()->defaultValue(0),
                'money_binhluan' => $this->float()->null()->defaultValue(0),
                'money_tinnhan' => $this->float()->null()->defaultValue(0),
                'money_tuongtac' => $this->float()->null()->defaultValue(0),
                'money_sodienthoai' => $this->float()->null()->defaultValue(0),
                'money_goiduoc' => $this->float()->null()->defaultValue(0),
                'money_lichhen' => $this->float()->null()->defaultValue(0),
                'money_khachden' => $this->float()->null()->defaultValue(0),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1)->comment('0:disabled, 1:activated'),
                'created_at' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200609_155318_create_table_report_facebook_ads cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200609_155318_create_table_report_facebook_ads cannot be reverted.\n";

        return false;
    }
    */
}
