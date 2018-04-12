<?php

use yii\db\Migration;

/**
 * Handles adding role to table `users`.
 */
class m180411_130628_add_role_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
      $this->addColumn('users', 'role', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
      $this->dropColumn('users', 'role');
    }
}
