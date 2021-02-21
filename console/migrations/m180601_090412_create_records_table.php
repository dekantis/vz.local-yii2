<?php

use yii\db\Migration;

/**
 * Handles the creation of table `records`.
 */
class m180601_090412_create_records_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('records', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),            
            'time' =>$this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'records_users',
            'records',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('records_users', 'records');
        $this->dropTable('records');
    }
}
