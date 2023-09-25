<?php
namespace backend\forms;

use common\models\Profile;
use common\models\User;
use yii\base\Model;
use Yii;


/**
 * @property mixed time
 */
class UserForm extends Model
{
    public $email;
    public $password;
    public $role;
    public $status;

    /** @var User */
    protected $user;

    public function __construct(array $config = [], User $user = null)
    {
        parent::__construct($config);

        if(null == $user) {
            $this->user = new User();
            $this->user->generateAuthKey();
        } else {
            $this->user = $user;
            $this->email = $this->user->email;
            $this->role = $this->user->role;
            $this->status = $this->user->status;
        }
    }

    public function rules()
    {
        return [
            ['password', 'string', 'min' => 3, 'max' => 64],
            ['role', 'integer'],
            ['status', 'integer'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Пользователь с таким email уже зарегистрирован.'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Пароль',
            'status' => 'Статус',
            'role' => 'Роль'
        ];
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        if ($this->password) {
            $this->user->setPassword($this->password);
        }

        $this->user->email = $this->email;
        $this->user->role = $this->role;
        $this->user->status = $this->status;
        $this->user->save();

        return true;
    }
}