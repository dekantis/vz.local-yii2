<?php

use yii\db\Migration;

class m171010_124904_execute_users_table extends Migration
{
    public function safeUp()
    {
        $this->execute(file_get_contents('users.sql'));
    }

    public function safeDown()
    {
        return "Данная миграция не может быть отменена";
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171010_124903_add_columns_to_news_table cannot be reverted.\n";

        return false;
    }
    */
}
