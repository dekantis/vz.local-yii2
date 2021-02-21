<?php

use yii\db\Migration;

/**
 * Handles adding animal_name to table `analysis_blank`.
 */
class m171005_114319_add_columns_to_analysis_blank_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('analysis_blank', 'animal_name', $this->string()->notNull());
        $this->addColumn('analysis_blank', 'animal_year', $this->integer());
        $this->addColumn('analysis_blank', 'category_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('analysis_blank', 'animal_name');
        $this->dropColumn('analysis_blank', 'animal_year');
        $this->dropColumn('analysis_blank', 'category_id');
    }
}
