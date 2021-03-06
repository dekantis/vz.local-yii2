<?php

use yii\db\Migration;

class m180403_140933_add_columns_to_analysis_standarts_table extends Migration
{
    public function safeUp()
    {
      $this->addColumn('analysis_standarts', 'ggt_min', $this->double()->notNull());
      $this->addColumn('analysis_standarts', 'cholesterol_min', $this->double()->notNull());
      $this->addColumn('analysis_standarts', 'mg_min', $this->double()->notNull());
      $this->addColumn('analysis_standarts', 'ldg_min', $this->double()->notNull());
      $this->addColumn('analysis_standarts', 'ggt_max', $this->double()->notNull());
      $this->addColumn('analysis_standarts', 'cholesterol_max', $this->double()->notNull());
      $this->addColumn('analysis_standarts', 'mg_max', $this->double()->notNull());
      $this->addColumn('analysis_standarts', 'ldg_max', $this->double()->notNull());
    }

    public function safeDown()
    {
      $this->dropColumn('analysis_standarts', 'ggt_min');
      $this->dropColumn('analysis_standarts', 'cholesterol_min');
      $this->dropColumn('analysis_standarts', 'mg_min');
      $this->dropColumn('analysis_standarts', 'ldg_min');
      $this->dropColumn('analysis_standarts', 'ggt_max');
      $this->dropColumn('analysis_standarts', 'cholesterol_max');
      $this->dropColumn('analysis_standarts', 'mg_max');
      $this->dropColumn('analysis_standarts', 'ldg_max');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180403_140933_add_columns_to_analysis_standarts_table cannot be reverted.\n";

        return false;
    }
    */
}
