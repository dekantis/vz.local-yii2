<?php

use yii\db\Migration;

class m170719_095217_create_animals_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('animals', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'year' => $this->smallInteger(4),
            'category_id' => $this->integer()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('animals');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170719_095217_create_animals cannot be reverted.\n";

        return false;
    }
    */
}
