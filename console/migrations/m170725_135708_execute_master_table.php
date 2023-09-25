<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170725_135708_execute_master_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('SET foreign_key_checks = 0;');
        $this->execute(file_get_contents('master.sql'));
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        return "База данных не может быть удалена";
    }
}
