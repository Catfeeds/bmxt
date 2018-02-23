<?php
namespace frontend\models;

use frontend\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $phone;
    public $sex;
    public $phone_code;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '此用户名已被占用。'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '此邮件地址已被占用。'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['sex', 'required'],

            ['phone', 'filter', 'filter' => 'trim'],
            ['phone', 'required'],
            ['phone', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '手机号已经注册过。'],
            ['phone', 'string', 'min' => 11, 'max' => 11],

            ['phone_code', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->phone_code = $this->phone_code;
            $user->sex = $this->sex;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    /*
     * 中文字
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'email' => '邮箱',
            'sex' => '性别',
            'phone' => '手机',
            'phone_code' => '手机验证码',
            'password' => '密码',
        ];
    }
}
