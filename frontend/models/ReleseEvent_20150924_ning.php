<?php

namespace app\models;

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
class ReleseEvent extends \yii\db\ActiveRecord
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
            'id' => 'ID',
            'event_name' => 'Event Name',
            'addit' => 'Addit',
            'event_type' => 'Event Type',
            'apply_time_start' => 'Apply Time Start',
            'apply_time_end' => 'Apply Time End',
            'place' => 'Place',
            'contact_name' => 'Contact Name',
            'contact_phone' => 'Contact Phone',
            'contact_emaill' => 'Contact Emaill',
            'orgnize' => 'Orgnize',
            'orgnize_name' => 'Orgnize Name',
            'extend_id' => 'Extend ID',
        ];
    }
}
