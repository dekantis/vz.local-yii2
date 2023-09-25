<?php

use yii\db\Migration;

class m171005_155658_rename_animal_id_to_category_id_in_analysis_standarts_table extends Migration
{
    public function safeUp()
    {
        $this->renameColumn('analysis_standarts', 'animal_id', 'category_id');
    }

    public function safeDown()
    {
        $this->renameColumn('analysis_standarts', 'category_id', 'animal_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171005_155658_rename_animal_id_to_category_id_in_analysis_standarts_table cannot be reverted.\n";

        return false;
    }
    */
}
