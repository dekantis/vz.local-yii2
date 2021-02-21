<?php

use yii\db\Migration;
use \yii\db\Schema;

class m180616_182920_fix_db extends Migration
{
    public function safeUp()
    {
//        $this->dropColumn('users', 'username');
//        $this->addColumn('users', 'email_confirm_token', Schema::TYPE_STRING);

//        $this->dropColumn('profile', 'avatar');
//        $this->dropColumn('profile', 'birthday');
//        $this->dropColumn('profile', 'gender');
//
//        $this->renameColumn('profile', 'second_name', 'last_name');
//        $this->renameColumn('profile', 'middle_name', 'patronymic');

//        $this->addColumn('profile', 'phone', Schema::TYPE_BIGINT);

//        $this->addColumn('records', 'animal_type', Schema::TYPE_STRING);
//        $this->addColumn('records', 'animal_name', 'Schema::TYPE_STRING);
//        $this->addColumn('records', 'reason_vizit', Schema::TYPE_TEXT);
//        $this->addColumn('records', 'clinic_id', Schema::TYPE_INTEGER);

//        $this->createTable('clinics', [
//            'id' => $this->primaryKey(),
//            'address' => $this->string(255)->notNull(),
//            'visible' => $this->boolean(),
//            'time' => $this->string(28)->notNull(),
//        ]);

        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'value' => $this->string(255)->notNull(),
        ]);

    }

    public function safeDown()
    {
        echo "m180616_182920_fix_db cannot be reverted.\n";
    }
}
