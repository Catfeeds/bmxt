<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%shoucang}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $event_id
 */
class Shoucang extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shoucang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'event_id'], 'required'],
            [['user_id', 'event_id'], 'integer']
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
            'event_id' => 'Event ID',
        ];
    }
    /**
     * @ 获取报名人数
     * @ return bool
     */
    public function getNumber()
    {
        return $this->hasOne(relese::className(), ['event_id' => 'id'])->count();
    }
    /**
     * @获取赛事类型
     */
    public function getType()
    {
        return $this->hasOne(relese::className(), ['id' => 'event_type']);
    }
    /*
     * 获取相同赛事
     */
    public function getOrders()
    {
        return $this->hasMany(relese::className(), ['id' => 'event_id']);
    }
}
