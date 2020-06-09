<?php

use yii\db\Migration;

/**
 * Class m200603_073911_create_table_social_agency
 */
class m200603_073911_create_table_social_agency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_social_agency = Yii::$app->db->getTableSchema('social_agency');
        if ($check_social_agency === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('social_agency', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'slug' => $this->string(255)->null(),
                'description' => $this->text()->null(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'created_at' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addColumn('social_agency', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
            $this->createIndex('index-slug', 'social_agency', 'slug');
            $this->createIndex('index-language', 'social_agency', 'language');
            $this->addForeignKey('fk_social_agency_created_by_user', 'social_agency', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_social_agency_updated_by_user', 'social_agency', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200603_073911_create_table_social_agency cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200603_073911_create_table_social_agency cannot be reverted.\n";

        return false;
    }
    */
}
