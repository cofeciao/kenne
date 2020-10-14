<?php

use yii\db\Migration;

/**
 * Class m201007_090421_create_table_iway_tray
 */
class m201007_090421_create_table_iway_tray extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $check_table = Yii::$app->db->getTableSchema('iway_tray');
        if($check_table == false){
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_tray', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull()->comment('Tên'),
                'code' => $this->string(255)->notNull()->comment('Mã'),
                'note' => $this->text()->comment('Ghi chú'),
                'date_delivery' => $this->integer(11)->null()->comment('Ngày giao'),
                'user_delivery' => $this->integer(11)->null()->comment('Người nhận'),
                'treatment_schedule_id' => $this->integer(11)->null()->comment('ID liệu trình điều trị'),
                'espect_date_begin' => $this->integer(11)->null()->comment('Ngày bắt đầu đeo tray dự kiến'),
                'espect_date_end' => $this->integer(11)->null()->comment('Ngày kết thúc đeo tray dự kiến'),
                'date_begin' => $this->integer(11)->null()->comment('Ngày bắt đầu đeo tray thực tế'),
                'date_end' => $this->integer(11)->null()->comment('Ngày kết thúc đeo tray thực tế'),
                'result' => $this->integer(11)->null()->defaultValue(0)->comment('Trạng thái đánh giá: 0 - chưa đánh giá, 1 - đạt, 2 - chưa đạt'),
                'evaluate' => $this->text()->null()->comment('Nội dung đánh giá tray'),
                'date_result' => $this->integer(11)->null()->comment('Thời gian đánh giá'),
                'user_result' => $this->integer(11)->null()->comment('Người đánh giá'),
                'status' => $this->integer(11)->null()->comment('Ép khay, Đóng hộp, Bàn giao phòng khám, Cắt viền khay'),
            ], $tableOptions);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201007_090421_create_table_iway_tray cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201007_090421_create_table_iway_tray cannot be reverted.\n";

        return false;
    }
    */
}
