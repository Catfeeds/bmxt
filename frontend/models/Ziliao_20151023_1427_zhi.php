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
 * @property integer $sex
 * @property string $phone
 * @property string $phone_code
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $telphone
 * @property integer $reg_time
 * @property string $birthday
 */
class Ziliao extends \yii\db\ActiveRecord
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
            [['username', 'auth_key', 'password_hash', 'email','xingming','dizhi', 'sex', 'created_at', 'updated_at', 'telphone', 'birthday'], 'required'],
            [[ 'status', 'created_at', 'updated_at', 'telphone', 'reg_time'], 'integer'],
            [['birthday'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email','sex',], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 11],
            [['phone_code'], 'string', 'max' => 4]
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
//            'auth_key' => 'Auth Key',
//            'password_hash' => 'Password Hash',
//            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'xingming' => '姓名',
            'sex' => '性别',
            'phone' => '手机',
//            'phone_code' => 'Phone Code',
//            'status' => 'Status',
//            'created_at' => 'Created At',
//            'updated_at' => 'Updated At',
//            'telphone' => 'Telphone',
//            'reg_time' => 'Reg Time',
            'birthday' => '生日',
            'dizhi' => '地址',
        ];
    }
}
