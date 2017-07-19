<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "file_storage".
 *
 * @property integer $id
 * @property string $path
 * @property integer $type_id
 *
 * @property Doctors[] $doctors
 */
class FileStorage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_storage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'type_id'], 'required'],
            [['type_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctors::className(), ['avatar_id' => 'id']);
    }
}
