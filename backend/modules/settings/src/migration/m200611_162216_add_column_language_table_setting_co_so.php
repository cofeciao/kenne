<?php

use yii\db\Migration;

/**
 * Class m200611_162216_add_column_language_table_setting_co_so
 */
class m200611_162216_add_column_language_table_setting_co_so extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $get_fields_setting_co_so = Yii::$app->db->getTableSchema('setting_co_so')->columns;
        if (!array_key_exists('language', $get_fields_setting_co_so)) {
            $this->addColumn('setting_co_so', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language for yii2' AFTER `description`");
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200611_162216_add_column_language_table_setting_co_so cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200611_162216_add_column_language_table_setting_co_so cannot be reverted.\n";

        return false;
    }
    */
}
