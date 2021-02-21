<?php
namespace frontend\forms;

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
    public $phone;
    public $reason_vizit;
    public $animal_type;
    public $animal_name;
    public $clinic_id;

    /** @var Profile $profile */
    protected $profile;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->profile = Yii::$app->user->identity->profile;
        $this->phone = '+' . $this->profile->phone;
    }

    public function rules()
    {
        return [
            ['phone', 'required'],
            ['phone', 'match', 'pattern' => '~\+\d{12}~'],

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

            [['date', 'hour'], 'validateDate']
        ];
    }

    public function validateDate($attribute)
    {
        $localTimeZone = new DateTimeZone('Europe/Minsk');
        $date = DateTime::createFromFormat('d.m.Y H:i', "{$this->date} {$this->hour}", $localTimeZone);
        $current = new DateTime('now', $localTimeZone);
        $interval = $current->diff($date);

        if ($interval->invert == 1) {
            $this->addError($attribute, 'Выберите коректные дату и время.');
        }
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

        $record = new Record();
        $record->time = $date->getTimestamp();
        $record->user_id = Yii::$app->user->getId();
        $record->animal_type = $this->animal_type;
        $record->animal_name = $this->animal_name;
        $record->reason_vizit = $this->reason_vizit;
        $record->clinic_id = $this->clinic_id;
        $record->save();

        $this->profile->phone = substr($this->phone, 1);
        $this->profile->save();
        return true;
    }
}