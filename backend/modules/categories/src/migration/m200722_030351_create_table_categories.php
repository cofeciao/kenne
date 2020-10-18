<?php

use yii\db\Migration;

/**
 * Class m200722_030351_create_table_categories
 */
class m200722_030351_create_table_categories extends Migration
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
            'cat_name'=> $this->string(255)->notNull()->unique(),
            'cat_status'=>$this->tinyInteger(1)->defaultValue(0),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null(),
        ],$tableOptions);

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
        echo "m200722_030351_create_table_categories cannot be reverted.\n";

        return false;
    }
    */
}
