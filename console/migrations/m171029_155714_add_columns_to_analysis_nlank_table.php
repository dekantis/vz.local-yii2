<?php

use yii\db\Migration;

class m171029_155714_add_columns_to_analysis_nlank_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('analysis_blank', 'ggt', $this->double());
        $this->addColumn('analysis_blank', 'cholesterol', $this->double());
        $this->addColumn('analysis_blank', 'mg', $this->double());
        $this->addColumn('analysis_blank', 'ldg', $this->double());
    }

    public function safeDown()
    {
        $this->dropColumn('analysis_blank', 'ggt');
        $this->dropColumn('analysis_blank', 'cholesterol');
        $this->dropColumn('analysis_blank', 'mg');
        $this->dropColumn('analysis_blank', 'ldg');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171029_155714_add_columns_to_analysis_nlank_table cannot be reverted.\n";

        return false;
    }
    */
}
