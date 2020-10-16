<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%slides}}`.
 */
class m200808_041436_add_sld_type_column_to_slides_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('slides', 'sld_type', $this->integer(1)->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('slides', 'sld_type');
    }
}
