<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * User model
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 *
 */
class Settings extends ActiveRecord
{
    public static function tableName()
    {
        return 'settings';
    }

    public static function getValue($name)
    {
        $setting = Settings::find()->where(['name' => $name])->one();
        return  $setting->value ?? false;
    }

    public static function setValue($name, $value)
    {
        $setting = Settings::find()->where(['name' => $name])->one();
        if (null == $setting) {
            $setting = new Settings();
            $setting->name = $name;
        }

        $setting->value = $value;
        $setting->save();
    }
}
