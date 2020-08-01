<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blogs}}`.
 */
class m200730_042033_create_blogs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blogs}}', [
            'id' => $this->primaryKey(),
            'image' => $this->json()->null(),
            'title' => $this->string(255)->notNull()->unique(),
            'descriptions' => $this->string(255)->notNull(),
            'date' => $this->dateTime(),
            'link' => $this->string(255),

            'comments' => $this->string(255),
            'status' => $this->smallInteger(1)->defaultValue(0),
            'search' => $this->string(255),
            'recent_post' => $this->string(255),
            'tags' => $this->string(50)->notNull(),
        ], $tableOptions);

        }

    public function Down()
    {
        $this->dropTable('{{%blogs}}');
    }
}
