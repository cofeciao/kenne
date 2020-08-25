<?php

use yii\db\Migration;

/**
 * Class m200824_154721_create_table_iway_fanpage
 */
class m200824_154721_create_table_iway_fanpage extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $check_customer_fanpage = Yii::$app->db->getTableSchema('iway_fanpage');
        if ($check_customer_fanpage === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_fanpage', [
                'id' => $this->primaryKey(),
                'origin_id' => $this->integer(11)->notNull(),
                'name' => $this->string(255)->notNull(),
                'description' => $this->text()->null(),
                'url_page' => $this->string(255)->null(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'created_at' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addColumn('iway_fanpage', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
            $this->createIndex('index-language', 'iway_fanpage', 'language');
            $this->addForeignKey('fk_iway_fanpage_created_by_user', 'iway_fanpage', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_fanpage_updated_by_user', 'iway_fanpage', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_fanpage_origin_id_origin', 'iway_fanpage', 'origin_id', 'iway_origin', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200824_154721_create_table_iway_fanpage cannot be reverted.\n";

        return false;
    }
}
