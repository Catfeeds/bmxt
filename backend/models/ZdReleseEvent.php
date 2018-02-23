<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%relese_event}}".
 *
 * @property string $id
 * @property string $event_name
 * @property integer $addit
 * @property integer $event_type
 * @property string $apply_time_start
 * @property string $apply_time_end
 * @property string $place
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $contact_emaill
 * @property integer $orgnize
 * @property string $orgnize_name
 * @property integer $extend_id
 * @property integer $is_extends
 * @property double $apply_money
 * @property string $event_img
 * @property integer $user_id
 * @property integer $is_end
 * @property string $wenzhang
 * @property string $jianjie
 * @property integer $is_top
 * @property string $detailed
 * @property string $begin
 */
class ZdReleseEvent extends \backend\backbase\BaseActiveRecord
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
            [['addit', 'event_type', 'contact_phone', 'orgnize', 'extend_id', 'is_extends', 'user_id', 'is_end', 'is_top'], 'integer'],
            [['event_type', 'apply_time_start', 'apply_time_end', 'contact_phone', 'orgnize', 'extend_id', 'user_id', 'is_end', 'wenzhang', 'jianjie', 'is_top', 'detailed'], 'required'],
            [['apply_money'], 'number'],
            [['wenzhang'], 'string'],
            [['event_name', 'place', 'contact_name', 'contact_emaill', 'orgnize_name'], 'string', 'max' => 60],
            [['apply_time_start', 'apply_time_end', 'begin'], 'string', 'max' => 100],
            [['event_img', 'detailed'], 'string', 'max' => 255],
            [['jianjie'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_name' => '赛事名称',
//            'addit' => 'Addit',
//            'event_type' => 'Event Type',
//            'apply_time_start' => 'Apply Time Start',
//            'apply_time_end' => 'Apply Time End',
//            'place' => 'Place',
//            'contact_name' => 'Contact Name',
//            'contact_phone' => 'Contact Phone',
//            'contact_emaill' => 'Contact Emaill',
//            'orgnize' => 'Orgnize',
//            'orgnize_name' => 'Orgnize Name',
//            'extend_id' => 'Extend ID',
//            'is_extends' => 'Is Extends',
//            'apply_money' => 'Apply Money',
//            'event_img' => 'Event Img',
//            'user_id' => 'User ID',
//            'is_end' => 'Is End',
//            'wenzhang' => 'Wenzhang',
//            'jianjie' => 'Jianjie',
            'is_top' => '是否置顶',
//            'detailed' => 'Detailed',
//            'begin' => 'Begin',
        ];
    }
}
