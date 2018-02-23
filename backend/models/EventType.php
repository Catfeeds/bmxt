<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%event_type}}".
 *
 * @property integer $id
 * @property string $event_type_name
 */
class EventType extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%event_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_type_name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_type_name' => 'Event Type Name',
        ];
    }
}
