<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blogs}}`.
 */
class m200729_081533_create_blogs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blogs}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(255),
            'title' => $this->string(255)->notNull()->unique(),
            'descriptions' => $this->string(255)->notNull(),
            'date' => $this->dateTime('d-M-Y H:i:s'),
            'comments' => $this->string(255),
            'status' => $this->smallInteger(1)->defaultValue(0),
            'search' => $this->string(255),
            'recent_post' => $this->string(255),
            'tags' => $this->string(50)->notNull(),
        ], $tableOptions);
        $check_rows = Yii::$app->db->createCommand('SELECT id FROM blogs')->queryOne();
        if($check_rows === false){
            $this->execute('INSERT INTO `blogs` (`id`, `image`, `title`, `descriptions`, `date`, `comments`, `search`, `recent_post`, `tags`, `status`) VALUES
    (27, \'1.jpg\', \'Blog Image Post\', \'The first line of lorem Ipsum: \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\', \'2020-07-27 15:47:22\', \'\', \'\', \'\', \'Scarf\', 1),
(28, \'2.jpg\', \'Post With Gallery\', \'The first line of lorem Ipsum: \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\', \'2020-07-27 15:49:42\', \'\', \'\', \'\', \'Frocks\', 1),
(29, \'3.jpg\', \'When an unknown printer took.\', \'The first line of lorem Ipsum: \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\', \'2020-07-27 15:50:48\', \'\', \'\', \'\', \'Jacket\', 1),
(30, \'6.jpg\', \'When an unknown printer took\', \'The first line of lorem Ipsum: \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\', \'2020-07-27 15:53:23\', \'\', \'\', \'\', \'Scarf\', 1),
(31, \'4.jpg\', \'When an unknown printer.\', \'The first line of lorem Ipsum: \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\', \'2020-07-27 17:53:02\', \'\', \'\', \'\', \'Shirt\', 1),
(32, \'5.jpg\', \'When an unknown printer\', \'The first line of lorem Ipsum: \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\', \'2020-07-28 09:46:02\', \'\', \'\', \'\', \'Jacket\', 1);'
            );
        }
    }

    public function safeDown()
    {
        $this->dropTable('{{%blogs}}');
    }
}
