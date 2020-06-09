<?php

use yii\db\Migration;

/**
 * Class m200603_074358_create_table_origin
 */
class m200603_074358_create_table_social_origin extends Migration
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
        /* check table exists */
        $check_social_origin = Yii::$app->db->getTableSchema('social_origin');
        if ($check_social_origin === null) {
            $this->createTable('social_origin', [
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
            $this->addColumn('social_origin', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
            $this->createIndex('index-slug', 'social_origin', 'slug');
            $this->createIndex('index-language', 'social_origin', 'language');
            $this->addForeignKey('fk_social_origin_created_by_user', 'social_origin', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_social_origin_updated_by_user', 'social_origin', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
        $check_social_agency_origin_hasmany = Yii::$app->db->getTableSchema('social_agency_origin_hasmany');
        if ($check_social_agency_origin_hasmany === null) {
            $this->createTable('social_agency_origin_hasmany', [
                'agency_id' => $this->integer(11)->notNull(),
                'origin_id' => $this->integer(11)->notNull()
            ], $tableOptions);
            $this->addPrimaryKey('pk_agency_origin_hasmany', 'social_agency_origin_hasmany', ['agency_id', 'origin_id']);
            $this->addForeignKey('fk_agency_origin_hasmany_agency_id', 'social_agency_origin_hasmany', 'agency_id', 'social_agency', 'id', 'CASCADE', 'CASCADE');
            $this->addForeignKey('fk_agency_origin_hasmany_origin_id', 'social_agency_origin_hasmany', 'origin_id', 'social_origin', 'id', 'CASCADE', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200603_074358_create_table_origin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200603_074358_create_table_origin cannot be reverted.\n";

        return false;
    }
    */
}
