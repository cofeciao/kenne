<?php

use yii\db\Migration;

/**
 * Class m201007_090435_create_table_iway_tray_images
 */
class m201007_090435_create_table_iway_tray_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table_name = 'iway_tray_images';
        $check_table = Yii::$app->db->getTableSchema($table_name);
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable($table_name, [
                'id' => $this->primaryKey(),
                'tray_id' => $this->integer(11)->notNull()->comment('ID tray'),
                'image' => $this->string(255)->notNull()->comment('Hình ảnh tray'),
                'type' => $this->integer(11)->notNull()->comment('Loại hình ảnh: chụp thẳng, chụp trái, chụp phải,...'),
                'status' => $this->tinyInteger(2)->null()->defaultValue(0)->comment('Trạng thái đánh giá: 0 - chưa đánh giá, 1 - chưa đạt, 2 - đạt'),
                'created_at' => $this->integer(11)->null()->comment('Thời gian chụp'),
                'evaluate' => $this->text()->null()->comment('Đánh giá của bác sĩ'),
                'evaluate_at' => $this->integer(11)->null()->comment('Thời gian đánh giá'),
                'evaluate_by' => $this->integer(11)->null()->comment('Bác sĩ đánh giá'),
            ], $tableOptions);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201007_090435_create_table_iway_tray_images cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201007_090435_create_table_iway_tray_images cannot be reverted.\n";

        return false;
    }
    */
}
