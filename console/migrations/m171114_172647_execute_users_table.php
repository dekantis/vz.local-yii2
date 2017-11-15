<?php

use yii\db\Migration;

class m171114_172647_execute_users_table extends Migration
{
    public function safeUp()
    {
        $this->execute(file_get_contents('users.sql'));
    }

    public function safeDown()
    {
        echo "m171114_172647_execute_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171114_172647_execute_users_table cannot be reverted.\n";

        return false;
    }
    */
}
