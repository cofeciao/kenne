<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%account}}`.
 */
class m200812_102536_add_verification_token_column_to_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%account}}', 'verification_token', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%account}}', 'verification_token');
    }

}
