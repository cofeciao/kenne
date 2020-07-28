<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%products}}`.
 */
class m200725_071139_add_pro_number_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%products}}', 'pro_number', $this->integer(11));
        $this->addCommentOnColumn('{{%products}}','pro_number','số lần bán được sản phẩm');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%products}}', 'pro_number');
        $this->dropCommentFromColumn('{{%products}}','pro_number');
    }
}
