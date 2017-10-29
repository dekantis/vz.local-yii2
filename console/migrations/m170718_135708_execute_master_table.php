<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170718_135708_execute_master_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute(file_get_contents('master.sql'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        return "База данных не может быть удалена";
    }
}
