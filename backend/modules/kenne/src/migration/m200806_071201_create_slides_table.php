<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%slides}}`.
 */
class m200806_071201_create_slides_table extends Migration
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
        $this->createTable('{{%slides}}', [
            'id' => $this->primaryKey(),
            'sld_title'=>$this->string(255)->notNull(),
            'sld_description'=>$this->string(255),
            'sld_image'=>$this->string(255)->notNull(),
            'sld_cat_id'=>$this->integer(11)->notNull(),
            'sld_status'=>$this->tinyInteger(1)->defaultValue(1),
            'created_at'=>$this->integer(11),
            'updated_at'=>$this->integer(11)
        ],$tableOptions);
        $this->addForeignKey('fk_categories_id_slides','slides','sld_cat_id','categories','id','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_categories_id_slides','slides');
        $this->dropTable('{{%slides}}');
    }
}
