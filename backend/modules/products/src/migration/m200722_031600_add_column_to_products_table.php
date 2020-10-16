<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%products}}`.
 */
class m200722_031600_add_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products','cat_id',$this->integer());
        $this->addForeignKey('fk_categories_id','products','cat_id','categories','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('products','cat_id');
        $this->dropForeignKey('fk_categories_id','products');
    }
}
