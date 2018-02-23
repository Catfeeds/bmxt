<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user_admin}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $telphone
 * @property integer $reg_time
 * @property string $birthday
 * @property integer $sex
 * @property integer $quanxian
 * @property integer $xitong
 * @property integer $yonghu
 * @property integer $caiwu
 * @property integer $guanggao
 * @property integer $tupian
 * @property integer $wenzhang
 * @property integer $saishi
 */
class UserAdmin extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'created_at', 'updated_at', 'telphone', 'birthday', 'sex'], 'required'],
            [['status', 'created_at', 'updated_at', 'telphone', 'reg_time', 'sex', 'quanxian', 'xitong', 'yonghu', 'caiwu', 'guanggao', 'tupian', 'wenzhang', 'saishi'], 'integer'],
            [['birthday'], 'safe'],
            [['username', 'password_hash'], 'string', 'max' => 255],
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
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'telphone' => 'Telphone',
            'reg_time' => 'Reg Time',
            'birthday' => 'Birthday',
            'sex' => 'Sex',
            'quanxian' => '权限管理',
            'xitong' => '系统管理',
            'yonghu' => '用户管理',
            'caiwu' => '财务管理',
            'guanggao' => '广告管理',
            'tupian' => '图片管理',
            'wenzhang' => '文章管理',
            'saishi' => '赛事管理',
        ];
    }
    public function getQuanxian($id)
    {
        return $this->quanxian;
    }
}
