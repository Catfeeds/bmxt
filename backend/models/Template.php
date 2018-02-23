<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%template}}".
 *
 * @property integer $id
 * @property string $temp_file_name
 * @property string $temp_file_value
 * @property integer $event_type_id
 */
class Template extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%template}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_type_id'], 'required'],
            [['event_type_id'], 'integer'],
            [['temp_file_name', 'temp_file_value'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'temp_file_name' => 'Temp File Name',
            'temp_file_value' => 'Temp File Value',
            'event_type_id' => 'Event Type ID',
        ];
    }
}
