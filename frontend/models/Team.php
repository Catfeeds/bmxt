<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%team}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $builder_id
 */
class Team extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%team}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'builder_id'], 'required'],
            [['builder_id','member_id'], 'integer'],
            [['name','team_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '团队名',
            'builder_id' => '邀请人',
            'member_id' => '被邀请人',
            'team_id'=>'队伍id',
        ];
    }

    /**
     * Return teamname
     */
    public static function getTeamname($id){

        $teamname =Team::findOne($id);
        return $teamname['name'];
    }
}
