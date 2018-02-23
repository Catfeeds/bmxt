<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%relese_team_event}}".
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
 * @property double $apply_money
 * @property string $event_img
 * @property integer $user_id
 * @property integer $is_end
 * @property string $wenzhang
 * @property string $jianjie
 * @property integer $is_top
 * @property string $detailed
 * @property string $begin
 * @property integer $collocation
 * @property string $people
 * @property string $leixing
 */
class ReleseTeamEvent extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%relese_team_event}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addit', 'event_type', 'contact_phone', 'orgnize', 'user_id', 'is_end', 'is_top', 'collocation', 'people'], 'integer'],
            [['event_type', 'apply_time_start', 'apply_time_end', 'contact_phone', 'orgnize', 'user_id', 'is_end', 'wenzhang', 'jianjie', 'is_top', 'detailed', 'collocation', 'people'], 'required'],
            [['apply_money'], 'number'],
            [['wenzhang'], 'string'],
            [['event_name', 'place', 'contact_name', 'contact_emaill', 'orgnize_name'], 'string', 'max' => 60],
            [['apply_time_start', 'apply_time_end', 'begin'], 'string', 'max' => 100],
            [['event_img', 'detailed', 'leixing'], 'string', 'max' => 255],
            [['jianjie'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'event_name' => '赛事名称',
            'addit' => '是否审核',
            'event_type' => '赛事类型',
            'apply_time_start' => '报名开始时间',
            'apply_time_end' => '报名结束时间',
            'place' => '地点',
            'contact_name' => '联系人',
            'contact_phone' => '联系电话',
            'contact_emaill' => '联系邮箱',
            'orgnize' => '组织',
            'orgnize_name' => '组织名称',
            'apply_money' => '报名费用',
            'event_img' => '赛事图片',
            'user_id' => '发布者id',
            'is_end' => '是否结束',
            'wenzhang' => '赛事文章',
            'jianjie' => '赛事简介',
            'is_top' => '是否置顶',
            'detailed' => '详细地址',
            'begin' => '比赛开始时间',
            'collocation' => '托管',
            'people' => '报名人数',
            'leixing' => '报名类型',
        ];
    }
}
