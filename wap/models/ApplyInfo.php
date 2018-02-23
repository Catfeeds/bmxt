<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%apply_info}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $event_name
 * @property string $apply_status
 * @property integer $is_end
 * @property integer $event_id
 * @property integer $apply_user
 * @property double $apply_money
 * @property string $id_number
 * @property integer $id_affirm
 * @property string $phone
 * @property integer $sex
 * @property string $bm_name
 * @property string $email
 * @property string $position
 * @property integer $is_paid
 */
class ApplyInfo extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%apply_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'event_id', 'apply_user', 'id_number', 'phone', 'position'], 'required'],
            [['user_id', 'is_end', 'event_id', 'apply_user', 'id_affirm', 'phone', 'sex','is_paid'], 'integer'],
            [['apply_money'], 'number'],
            [['event_name', 'apply_status', 'bm_name','id_number', 'position'], 'string', 'max' => 60],
            [['id_number'], 'match', 'pattern' => '/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/'],
            [['phone'],'match','pattern' => '/13[0123456789]{1}\d{8}|14[57]\d{8}|15[012356789]\d{8}|18[0123456789]\d{8}/'],
            ['email', 'email'],
            [['bm_name','email','sex'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'event_name' => '赛事名',
            'apply_status' => 'Apply Status',
            'is_end' => 'Is End',
            'event_id' => 'Event ID',
            'apply_user' => 'Apply User',
            'apply_money' => 'Apply Money',
            'id_number' => '身份证号',
            'id_affirm' => 'Id Affirm',
            'phone' => '手机号',
            'sex' => '性别',
            'bm_name' => '姓名',
            'email' => '邮箱',
            'position' => '名次',
            'is_paid'   => '是否支付成功'
        ];
    }
    /**
     * @ ��ȡ��������
     * @ return bool
     */
    public function getName()
    {
        return $this->hasOne(users::className(), ['id' => 'user_id']);
    }
    /*
     * 小智 两表关联查询
     */
    public function getOrders()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id']);
    }
}
