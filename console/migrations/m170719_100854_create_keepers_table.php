<?php

use yii\db\Migration;

/**
 * Handles the creation of table `keepers`.
 */
class m170719_100854_create_keepers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('keepers', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'lastname' => $this->string(255)->notNull(),
            'patronymic' => $this->string(255)->notNull(),

        ]);

        $this->createTable('animals_keepers', [
            'id' => $this->primaryKey(),
            'animal_id' => $this->integer()->notNull(),
            'keeper_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'animals_keepers-animal',
            'animals_keepers',
            'animal_id',
            'animals',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'animals_keepers-keeper',
            'animals_keepers',
            'keeper_id',
            'keepers',
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
        $this->dropForeignKey('animals_keepers-keeper', 'animals_keepers');
        $this->dropForeignKey('animals_keepers-animal', 'animals_keepers');
        $this->dropTable('keepers');
        $this->dropTable('animals_keepers');
    }
}
