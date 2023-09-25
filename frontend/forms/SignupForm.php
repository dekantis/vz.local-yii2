<?php
namespace frontend\forms;

use yii\base\Model;
use common\models\User;
use common\models\Profile;
use Yii;

class SignupForm extends Model
{
    public $email;
    public $password;
    public $password_repeat;
    public $first_name;
    public $last_name;
    public $patronymic;
    public $phone;

    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Пользователь с таким email уже зарегистрирован.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message'=> 'Пароли не совпадают.'],
            ['first_name', 'string', 'min' => 3, 'max' => 255],
            ['last_name', 'string', 'min' => 3, 'max' => 255],
            ['patronymic', 'string', 'min' => 3, 'max' => 255],
            ['phone', 'match', 'pattern' => '~(\+\d{12})~']
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

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->role = User::ROLE_USER;
        $user->status = User::STATUS_EMAIL_CONFIRM;
        $user->generateAuthKey();
        $user->generateEmailConfirmToken();
        $user->save();

        Yii::$app
            ->mailer
            ->compose(
                ['html' => 'confirmEmail-html'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => 'vetzooland.by'])
            ->setTo($user->email)
            ->setSubject('Подтверждение email на vetzooland.by')
            ->send();

        /** @var Profile $profile */
        $profile = $user->profile;
        $profile->first_name = $this->first_name;
        $profile->last_name = $this->last_name;
        $profile->patronymic = $this->patronymic;
        $profile->phone = substr($this->phone, 1);
        $profile->user_id = $user->id;
        $profile->save();

        return true;
    }
}