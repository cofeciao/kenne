<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%blogs}}`.
 */
class m200727_040757_add_status_column_to_blogs_table extends Migration
{
    public function up()
    {
        $this->addColumn('blogs', 'status', $this->smallInteger(1)->defaultValue(0));
    }

    public function down()
    {
        $this->dropColumn('blogs', 'status');
    }
}
