<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%message}}".
 *
 * @property integer $id
 * @property integer $inviter
 * @property integer $beinviter
 * @property string $send_time
 * @property integer $status
 * @property integer $reply
 */
class Message extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inviter', 'beinviter'], 'required'],
            [['inviter', 'beinviter', 'status', 'reply'], 'integer'],
            [['send_time'], 'safe'],
            [['team_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '序号',
            'inviter' => '邀请人',
            'beinviter' => '被邀请人',
            'send_time' => '邀请时间',
            'status' => '邀请状态',
            'reply' => '回复状态',
            'team_id'=>'团队id，'
        ];
    }
}
