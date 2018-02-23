<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%event_state}}".
 *
 * @property integer $id
 * @property string $state
 * @property integer $is_end
 */
class EventState extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%event_state}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'is_end'], 'required'],
            [['is_end'], 'integer'],
            [['state'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'State',
            'is_end' => 'Is End',
        ];
    }
}
