<?php

use yii\db\Migration;

class m171027_161628_remove_unused_columns_and_tables extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('analysis_blank', 'animal_id');
        $this->dropTable('animals');
        $this->dropTable('keepers');
        $this->dropTable('animals_keepers');
    }

    public function safeDown()
    {
        $this->addColumn('analysis_blank', 'animal_id', $this->integer()->notNull());
        $this->createTable('animals', [
            'id' => $this->primaryKey(),
        ]);
        $this->createTable('keepers', [
            'id' => $this->primaryKey(),
        ]);
        $this->createTable('animals_keepers', [
            'id' => $this->primaryKey(),
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171027_161628_remove_unused_columns_and_tables cannot be reverted.\n";

        return false;
    }
    */
}
