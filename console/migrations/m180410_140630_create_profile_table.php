<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profile`.
 */
class m180410_140630_create_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('profile', [
            'user_id' => $this->primaryKey(),
            'avatar' => $this->string(),
            'first_name' => $this->string(32),
            'second_name' => $this->string(32),
            'middle_name' => $this->string(32),
            'birthday' => $this->integer(),
            'gender' => $this->integer(1),
        ]);
        $this->addForeignKey(
          'profile_users',
          'profile',
          'user_id',
          'users',
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
        $this->dropForeignKey('profile_users', 'profile');
        $this->dropTable('profile');
    }
}
