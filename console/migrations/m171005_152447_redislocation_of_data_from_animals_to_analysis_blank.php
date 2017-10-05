<?php

use yii\db\Migration;

class m171005_152447_redislocation_of_data_from_animals_to_analysis_blank extends Migration
{
    public function safeUp()
    {
        $sql = '
        UPDATE analysis_blank, animals
            SET
                analysis_blank.animal_name = animals.name,
                analysis_blank.animal_year = animals.year,
                analysis_blank.category_id = animals.category_id
            WHERE
                analysis_blank.animal_id = animals.id';
        $this->execute($sql);
    }

    public function safeDown()
    {
        $sql = '
        UPDATE analysis_blank
            SET
                analysis_blank.animal_name = \'\',
                analysis_blank.animal_year = \'\',
                analysis_blank.category_id = \'\'
        ';
        $this->execute($sql);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171005_152447_redislocation_of_data_from_animals_to_analysis_blank cannot be reverted.\n";

        return false;
    }
    */
}
