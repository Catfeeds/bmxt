<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%leixing}}".
 *
 * @property integer $id
 * @property string $leixing
 * @property string $team_event_id
 */
class Leixing extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%leixing}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['leixing', 'team_event_id'], 'required'],
            [['team_event_id'], 'integer'],
            [['leixing'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'leixing' => '赛事分组',
            'team_event_id' => '赛事id',
        ];
    }
}
