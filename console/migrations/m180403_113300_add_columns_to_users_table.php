<?php

use yii\db\Migration;

class m180403_113300_add_columns_to_users_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('users', 'name', $this->string());
        $this->addColumn('users', 'family', $this->string());
        $this->addColumn('users', 'phone', $this->string());
    }

    public function safeDown()
    {
        $this->dropColumn('users', 'name');
        $this->dropColumn('users', 'family');
        $this->dropColumn('users', 'phone');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180403_113300_add_columns_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
