<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%team_apply_info}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $event_name
 * @property string $apply_status
 * @property integer $is_end
 * @property integer $event_id
 * @property string $apply_team_id
 * @property double $apply_money
 * @property integer $id_affirm
 * @property integer $position
 * @property integer $is_paid
 */
class TeamApplyInfo extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%team_apply_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'event_id', 'apply_team_id', 'position'], 'required'],
            [['user_id', 'is_end', 'event_id', 'id_affirm', 'position', 'is_paid'], 'integer'],
            [['apply_money'], 'number'],
            [['event_name', 'apply_status'], 'string', 'max' => 60],
            [['apply_team_id'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '报名人id',
            'event_name' => '赛事名称',
            'apply_status' => '申请状态',
            'is_end' => '是否结束',
            'event_id' => '团队赛事id',
            'apply_team_id' => '申请团队编号',
            'apply_money' => '团队报名费',
            'id_affirm' => '团队签到',
            'position' => '比赛名次',
            'is_paid' => '是否支付',
        ];
    }
}
