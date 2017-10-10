<?php

use yii\db\Migration;

class m171010_124903_add_columns_to_news_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('news', 'title', $this->string()->notNull());
        $this->addColumn('news', 'news_discriprion', $this->string()->notNull());
        $this->addColumn('news', 'text_html', $this->text()->notNull());
        $this->addColumn('news', 'image_source', $this->string()->notNull());
        $this->addColumn('news', 'created_at', $this->integer()->notNull());
        $this->addColumn('news', 'updated_at', $this->integer()->notNull());
    }

    public function safeDown()
    {
        $this->dropColumn('news', 'title');
        $this->dropColumn('news', 'news_discriprion');
        $this->dropColumn('news', 'text_html');
        $this->dropColumn('news', 'image_source');
        $this->dropColumn('news', 'created_at');
        $this->dropColumn('news', 'updated_at');
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
