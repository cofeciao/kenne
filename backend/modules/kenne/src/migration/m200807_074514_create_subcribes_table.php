<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subcribes}}`.
 */
class m200807_074514_create_subcribes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subcribes}}', [
            'id' => $this->primaryKey(),
            'sub_email'=>$this->string(30)->notNull(),
            'sub_status'=>$this->tinyInteger(1)->defaultValue(1),
            'created_at'=>$this->integer(11),
            'updated_at'=>$this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subcribes}}');
    }
}
