<?php

namespace backend\models;

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
 * @property string $xingming
 * @property string $sex
 * @property string $dizhi
 * @property string $phone
 * @property string $phone_code
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $telphone
 * @property integer $reg_time
 * @property string $birthday
 * @property integer $quanxian
 * @property integer $sjuser_id
 */
class Users extends \backend\backbase\BaseActiveRecord
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
            [['username', 'auth_key', 'password_hash', 'email', 'sex', 'created_at', 'updated_at', 'telphone', 'birthday'], 'required'],
            [['status', 'created_at', 'updated_at', 'telphone', 'reg_time', 'quanxian'], 'integer'],
            [['birthday'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'dizhi','sjuser_id'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['xingming'], 'string', 'max' => 10],
            [['sex', 'phone_code'], 'string', 'max' => 6],
            [['phone'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户ID',
            'username' => '姓名',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'xingming' => 'Xingming',
            'sex' => 'Sex',
            'dizhi' => 'Dizhi',
            'phone' => 'Phone',
            'phone_code' => 'Phone Code',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'telphone' => 'Telphone',
            'reg_time' => 'Reg Time',
            'birthday' => 'Birthday',
            'quanxian' => '权限',
            'sjuser_id'=>'所属上级ID',
        ];
    }
}
