<?php
namespace backend\forms;

use common\models\Profile;
use common\models\Record;
use yii\base\Model;
use DateTime;
use DateTimeZone;
use Yii;


/**
 * @property mixed time
 */
class RecordForm extends Model
{
    public $hour;
    public $date;
    public $reason_vizit;
    public $animal_type;
    public $animal_name;
    public $clinic_id;

    public $record = null;

    public function __construct(array $config = [], Record $record = null)
    {
        parent::__construct($config);
        $this->record = $record;

        if (null != $this->record) {
            $this->reason_vizit = $record->reason_vizit;
            $this->animal_type = $record->animal_type;
            $this->animal_name = $record->animal_name;
            $this->clinic_id = $record->clinic_id;
            $this->clinic_id = $record->clinic_id;

            $date = new DateTime("@{$record->time}");
            $this->date = $date->format("d.m.Y");
            $this->hour = $date->format("H:i");
        }
    }

    public function rules()
    {
        return [
            ['date', 'required'],
            ['date', 'datetime', 'format' => 'php:d.m.Y'],

            ['hour', 'required'],
            ['hour', 'datetime', 'format' => 'php:H:m'],

            ['animal_type', 'required'],
            ['animal_type', 'string', 'min' => 3, 'max' => 64],

            ['animal_name', 'required'],
            ['animal_type', 'string', 'min' => 3, 'max' => 64],

            ['reason_vizit', 'required'],
            ['reason_vizit', 'string', 'min' => 10, 'max' => 512],

            ['clinic_id', 'required'],
            ['clinic_id', 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Имя пользователя',
            'date' => 'Дата записи',
            'hour' => 'Время записи',
            'reason_vizit' => 'Причина посещения',
            'animal_type' => 'Вид животного',
            'animal_name' => 'Кличка животного',
            'clinic_id' => 'Выбрать адрес лечебницы',
            'phone' => 'Номер телефона'
        ];
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        $date = DateTime::createFromFormat('d.m.Y H:i', "{$this->date} {$this->hour}");

        if (null == $this->record) {
            $this->record = new Record();
        }
        $this->record->time = $date->getTimestamp();
        $this->record->user_id = Yii::$app->user->getId();
        $this->record->animal_type = $this->animal_type;
        $this->record->animal_name = $this->animal_name;
        $this->record->reason_vizit = $this->reason_vizit;
        $this->record->clinic_id = $this->clinic_id;
        $this->record->save();

        return true;
    }
}