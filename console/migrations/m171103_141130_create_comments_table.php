<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m171103_141130_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'text' => $this->string()->notNull(),
            'date' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
