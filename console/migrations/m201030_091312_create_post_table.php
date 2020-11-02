<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m201030_091312_create_post_table extends Migration
{
    private $tableName = '{{%post}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'brief' => $this->text(),
            'content' => $this->text()->notNull(),
            'slug' => $this->string(100)->notNull(),
            'banner' => $this->string(255),
            'user_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);

        $this->createIndex('created_at', $this->tableName, 'created_at');
        $this->addForeignKey('{{%fk_post_user}}', $this->tableName, 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
