<?php

namespace frontend\models;

use backend\models\EventType;
use common\models\ApplyInfo;
use Yii;

/**
 * This is the model class for table "{{%relese_event}}".
 *
 * @property integer $id
 * @property string $event_name
 * @property integer $addit
 * @property integer $event_type
 * @property string $apply_time_start
 * @property integer $apply_time_end
 * @property string $place
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $contact_emaill
 * @property integer $orgnize
 * @property string $orgnize_name
 * @property integer $extend_id
 */
class Relese extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%relese_event}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addit', 'event_type', 'apply_time_start', 'apply_time_end', 'contact_phone', 'orgnize', 'extend_id'], 'integer'],
            [['event_type', 'apply_time_start', 'apply_time_end', 'contact_phone', 'orgnize', 'extend_id'], 'required'],
            [['event_name', 'place', 'contact_name', 'contact_emaill', 'orgnize_name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '序号',
            'event_name' => '比赛项目',
            'addit' => 'Addit',
            'event_type' => '比赛种类',
            'apply_time_start' => '开始时间',
            'apply_time_end' => '结束时间',
            'place' => '比赛地点',
            'contact_name' => '联系人',
            'contact_phone' => '联系电话',
            'contact_emaill' => '联系人邮箱',
            'orgnize' => 'Orgnize',
            'orgnize_name' => 'Orgnize Name',
            'extend_id' => '赛事id',
        ];
    }
    /**
     * @获取赛事类型
     */
    public function getType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type']);
    }
    /**
     * @ 获取报名人数
     */
    public function getNumber()
    {
        return $this->hasOne(ApplyInfo::className(), ['event_id' => 'id'])->count();
    }
    /**
     * @获取赛事状态
     */
    public function getState()
    {
        return $this->hasOne(EventState::className(), ['is_end' => 'is_end']);
    }
}
