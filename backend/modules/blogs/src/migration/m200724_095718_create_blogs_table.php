<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blogs}}`.
 */
class m200724_095718_create_blogs_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blogs}}', [
            'id' => $this->primaryKey(),
            'status' => $this->tinyInmiteger()->notNull(),
            'image' => $this->string(255),
            'title' => $this->string(255)->notNull()->unique(),
            'descriptions' => $this->string(255)->notNull(),
            'date' => $this->dateTime('d-M-Y H:i:s'),
            'comments' => $this->string(255),
            'status' => $this->smallInteger()->defaultValue(0),
            'search' => $this->string(255),
            'recent_post' => $this->string(255),
            'tags' => $this->string(50)->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%blogs}}');
    }
}
