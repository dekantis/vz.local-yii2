<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `animals`.
 */
class m171005_154526_drop_unused_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropForeignKey('animals_keepers-keeper', 'animals_keepers');
        $this->dropForeignKey('animals_keepers-animal', 'animals_keepers');
        $this->dropForeignKey('analysis_blank-animal', 'analysis_blank');
        $this->dropColumn('analysis_blank', 'animal_id');
        $this->dropTable('keepers');
        $this->dropTable('animals_keepers');
        $this->dropTable('animals');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        echo 'Данная миграция не может быть отменена';
        return false;
    }
}
