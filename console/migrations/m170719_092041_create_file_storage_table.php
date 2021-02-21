<?php

use yii\db\Migration;

/**
 * Handles the creation of table `file_storage`.
 */
class m170719_092041_create_file_storage_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('file_storage', [
            'id' => $this->primaryKey(),
            'path' => $this->string(255)->notNull(),
            'type_id' => $this->smallInteger()->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('file_storage');
    }
}
