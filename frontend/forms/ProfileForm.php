<?php
namespace frontend\forms;

use yii\base\Model;
use common\models\User;
use common\models\Profile;
use Yii;

class ProfileForm extends Model
{
    public $first_name;
    public $last_name;
    public $patronymic;
    public $phone;

    /** @var Profile $profile */
    protected $profile;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->profile = Yii::$app->user->identity->profile;
        $this->phone = '+' . $this->profile->phone;
        $this->first_name = $this->profile->first_name;
        $this->last_name = $this->profile->last_name;
        $this->patronymic = $this->profile->patronymic;
    }

    public function rules()
    {
        return [
            ['first_name', 'string', 'min' => 3, 'max' => 255],
            ['last_name', 'string', 'min' => 3, 'max' => 255],
            ['patronymic', 'string', 'min' => 3, 'max' => 255],
            ['phone', 'match', 'pattern' => '~\+\d{12}~']
        ];
    }
    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон'
        ];
    }

    public function save()
    {
        if (!$this->validate()) {
            return null;
        }

        $profile = Yii::$app->user->identity->profile;
        $profile->first_name = $this->first_name;
        $profile->last_name = $this->last_name;
        $profile->patronymic = $this->patronymic;
        $profile->phone = substr($this->phone, 1);

        return $profile->save();
    }
}