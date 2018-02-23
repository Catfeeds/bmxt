<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%apply_info}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $enent_name
 * @property string $apply_status
 * @property integer $is_end
 * @property integer $event_id
 */
class ApplyInfo extends \frontend\frontbase\BaseActiveRecord
{
    const STATUS_ACTIVE = 10;
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
            [['user_id', 'event_id'], 'required'],
            [['user_id', 'is_end', 'event_id'], 'integer'],
            [['enent_name', 'apply_status'], 'string', 'max' => 60]
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
            'enent_name' => 'Enent Name',
            'apply_status' => 'Apply Status',
            'is_end' => 'Is End',
            'event_id' => 'Event ID',
        ];
    }
    public static function findEvent_id($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    /**
     * @ 获取报名人名
     * @ return bool
     */
    public function getName()
    {
        return $this->hasOne(users::className(), ['id' => 'user_id']);
    }

}
