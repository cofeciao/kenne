<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%blogs}}`.
 */
class m200803_105849_add_slug_column_to_blogs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('blogs', 'slug', $this->string()->unique());
    }

    public function down()
    {
        $this->dropColumn('blogs', 'slug');
    }
}
