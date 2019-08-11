<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%useractivity}}`.
 */
class m190811_194358_create_useractivity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%useractivity}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'activity_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_useractivity_user_id',
            'useractivity',
            'author_id',
            'users',
            'id',
            'RESTRICT',
            'CASCADE');
        
        $this->addForeignKey(
            'FK_useractivity_activity_id',
            'useractivity',
            'activity_id',
            'activity',
            'id',
            'RESTRICT',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%useractivity}}');
    }
}
