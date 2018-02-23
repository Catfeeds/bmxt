<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%info}}".
 *
 * @property integer $bm_id
 * @property integer $user_id
 * @property string $bm_name
 * @property integer $sex
 * @property string $birthday
 * @property integer $phone
 * @property integer $bm_time
 * @property string $email
 * @property string $id_number
 * @property integer $status
 * @property integer $project
 */
class Info extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','bm_name','sex','email', 'birthday', 'phone', 'bm_time', 'id_number', 'project'], 'required'],
            [['user_id', 'sex', 'phone', 'bm_time', 'id_number', 'status', 'project'], 'integer'],
            [['birthday'], 'safe'],
            [['bm_name'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 255]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bm_id' => '报名id',
            'user_id' => '用户id',
            'bm_name' => '姓名',
            'sex' => '性别',
            'birthday' => '生日',
            'phone' => '手机号',
            'bm_time' => '报名时间',
            'email' => '邮箱',
            'id_number' => '身份证号',
            'status' => '状态',
            'project' => '赛事id',
        ];
    }
}
