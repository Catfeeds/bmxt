<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%newss}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $newss
 * @property string $event_id
 */
class Newss extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%newss}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'newss'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['newss'], 'string', 'max' => 10000],
            [['event_id'],'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '标题',
            'newss' => '内容',
            'event_id'=>'赛事编号'
        ];
    }
}
