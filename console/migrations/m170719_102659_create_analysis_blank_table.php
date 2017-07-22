<?php

use yii\db\Migration;

/**
 * Handles the creation of table `analysis_blank`.
 */
class m170719_102659_create_analysis_blank_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('analysis_blank', [
            'id' => $this->primaryKey(),
            'animal_id' => $this->integer()->notNull(),
            'keeper' => $this->string(255)->notNull(),
            'doctor_id' => $this->integer()->notNull(),
            'glucose' => $this->double(),
            'creatinine' => $this->double(),
            'alt' => $this->double(),
            'ast' => $this->double(),
            'urea' => $this->double(),
            'lamilaza' => $this->double(),
            'calcium' => $this->double(),
            'total_protein' => $this->double(),
            'total_bilirubin' => $this->double(),
            'alkaline_phosphatase' => $this->double(),
            'phosphorus' => $this->double(),
            'date_publication' => $this->integer()->notNull(),
            'medical_mark' =>$this->text(),
        ]);

        $this->addForeignKey(
            'analysis_blank-animal',
            'analysis_blank',
            'animal_id',
            'animals',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'analysis_blank-doctor',
            'analysis_blank',
            'doctor_id',
            'doctors',
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
        $this->dropForeignKey('analysis_blank-animal', 'analysis_blank');
        $this->dropForeignKey('analysis_blank-keeper', 'analysis_blank');
        $this->dropForeignKey('analysis_blank-doctor', 'analysis_blank');
        $this->dropTable('analysis_blank');
    }
}
