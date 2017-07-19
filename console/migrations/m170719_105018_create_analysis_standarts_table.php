<?php

use yii\db\Migration;

/**
 * Handles the creation of table `analysis_resaults`.
 */
class m170719_105018_create_analysis_standarts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('analysis_standarts', [
            'id' => $this->primaryKey(),
            'animal_id' => $this->integer()->notNull(),
            'glucose_min' => $this->double()->notNull(),
            'creatinine_min' => $this->double()->notNull(),
            'alt_min' => $this->double()->notNull(),
            'ast_min' => $this->double()->notNull(),
            'urea_min' => $this->double()->notNull(),
            'lamilaza_min' => $this->double()->notNull(),
            'calcium_min' => $this->double()->notNull(),
            'total_protein_min' => $this->double()->notNull(),
            'total_bilirubin_min' => $this->double()->notNull(),
            'alkaline phosphatase_min' => $this->double()->notNull(),
            'phosphorus_min' => $this->double()->notNull(),
            'glucose_max' => $this->double()->notNull(),
            'creatinine_max' => $this->double()->notNull(),
            'alt_max' => $this->double()->notNull(),
            'ast_max' => $this->double()->notNull(),
            'urea_max' => $this->double()->notNull(),
            'lamilaza_max' => $this->double()->notNull(),
            'calcium_max' => $this->double()->notNull(),
            'total_protein_max' => $this->double()->notNull(),
            'total_bilirubin_max' => $this->double()->notNull(),
            'alkaline phosphatase_max' => $this->double()->notNull(),
            'phosphorus_max' => $this->double()->notNull(),
        ]);

        $this->addForeignKey(
            'analysis_standarts-animal',
            'analysis_standarts',
            'animal_id',
            'animals',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('analysis_standarts-animal', 'analysis_standarts');
        $this->dropTable('analysis_standarts');
    }
}
