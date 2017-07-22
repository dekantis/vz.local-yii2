<?php

use yii\db\Migration;

/**
 * Handles the creation of table `doctor`.
 */
class m170719_094204_create_doctors_table extends Migration
{

    public function up()
    {
        $this->createTable('doctors', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'lastname' => $this->string(255)->notNull(),
            'patronymic' => $this->string(255)->notNull(),
            'specialisation_id' => $this->integer()->notNull(),
            'avatar_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'doctors-avatar',
            'doctors',
            'avatar_id',
            'file_storage',
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
        $this->dropForeignKey('doctors-avatar', 'doctors');
        $this->dropTable('doctors');
    }
}
