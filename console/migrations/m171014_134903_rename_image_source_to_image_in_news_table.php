<?php

use yii\db\Migration;

class m171014_134903_rename_image_source_to_image_in_news_table extends Migration
{
    public function safeUp()
    {
        $this->renameColumn('news', 'image_source', 'image');
    }

    public function safeDown()
    {
        $this->renameColumn('news', 'image', 'image_source');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171014_134903_rename_image_source_to_image_in_news_table cannot be reverted.\n";

        return false;
    }
    */
}
