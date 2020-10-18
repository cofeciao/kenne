<?php

use yii\db\Migration;

/**
 * Class m200729_040746_create_table_categories
 */
class m200729_040746_create_table_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%categories}}',[
            'id' => $this->primaryKey(),
            'cat_slug'=>$this->string(255),
            'cat_name'=> $this->string(255)->notNull()->unique(),
            'cat_status'=>$this->tinyInteger(1)->defaultValue(0),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null(),
        ],$tableOptions);
        $check_rows = Yii::$app->db->createCommand('SELECT id FROM categories')->queryOne();
        if($check_rows === false){
            $this->execute('INSERT INTO `categories` (`id`, `cat_name`, `cat_status`, `created_at`, `updated_at`, `cat_slug`) VALUES
(6, \'Áo\', 1, \'2020-07-25 09:53:09\', \'2020-07-25 09:53:09\', \'ao\'),
(7, \'Ba lô\', 1, \'2020-07-25 09:53:25\', \'2020-07-25 09:53:25\', \'ba-lo\'),
(8, \'Giày\', 1, \'2020-07-25 09:56:13\', \'2020-07-25 09:56:13\', \'giay\'),
(9, \'Váy\', 1, \'2020-07-25 09:57:13\', \'2020-07-25 09:57:13\', \'vay\');'
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable('{{%categories}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200729_040746_create_table_categories cannot be reverted.\n";

        return false;
    }
    */
}
