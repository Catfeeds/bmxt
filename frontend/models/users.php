<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $dizhi
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $telphone
 * @property integer $reg_time
 * @property string $birthday
 * @property integer $sex
 * @property integer $quanxian
 */
class Users extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email','dizhi', 'created_at', 'updated_at', 'telphone', 'birthday', 'sex'], 'required'],
            [['status', 'created_at', 'updated_at', 'telphone', 'reg_time', 'sex', 'quanxian'], 'integer'],
            [['birthday'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password_hash' => '密码',
            'password_reset_token' => 'Password Reset Token',
            'email' => '邮箱',
            'dizhi' => '地址',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'telphone' => '电话',
            'reg_time' => 'Reg Time',
            'birthday' => '生日',
            'sex' => '性别',
            'quanxian' => '权限',
        ];
    }
}
