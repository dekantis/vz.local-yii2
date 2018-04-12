<?php
namespace common\models;
use yii\base\Model;

class SignupForm extends Model{

 public $username;
 public $password;
 public $phone;
 public $name;
 public $family;

 public function rules() {
   return [
     [['username', 'password'], 'required', 'message' => 'Заполните поле'],
     [['username', 'password'], 'string'],
     ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
   ];
 }

 public function attributeLabels() {
   return [
   'username' => 'Логин',
   'password' => 'Пароль',
   'name' => 'Ваше имя',
   'family' => 'Ваша фамилия',
   'phone' => 'Ваш номер телефона (необходим для подтверждения регистрации)',
  ];
 }

}
