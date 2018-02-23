<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use frontend\models\ApplyInfo;

use frontend\models\EventType;
use frontend\models\Template;
use frontend\models\Organizes;

/**
 * This is the model class for table "{{%relese_team_event}}".
 *
 * @property integer $id
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
 * @property integer $people
 * @property string $leixing
 * @property string $family
 */
class ReleseTeamEvent extends \frontend\frontbase\BaseActiveRecord
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
            [['addit', 'event_type', 'contact_phone', 'orgnize', 'user_id', 'is_end', 'is_top', 'collocation', 'people','family'], 'integer'],
            [['event_type', 'apply_time_start', 'apply_time_end', 'contact_phone', 'orgnize', 'user_id', 'is_end', 'wenzhang', 'jianjie', 'is_top', 'detailed', 'collocation', 'people','leixing'], 'required'],
            [['apply_money'], 'number'],
            [['wenzhang'], 'string'],
            [['event_name', 'place', 'contact_name', 'contact_emaill', 'orgnize_name'], 'string', 'max' => 60],
            [['apply_time_start', 'apply_time_end', 'begin'], 'string', 'max' => 100],
            [['event_img', 'detailed','leixing'], 'string', 'max' => 255],
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
            'addit' => '是否审核',
            'event_type' => '赛事类型',
            'apply_time_start' => '报名开始时间',
            'apply_time_end' => '报名结束时间',
            'place' => '赛事地点',
            'contact_name' => '联系人姓名',
            'contact_phone' => '联系人手机号',
            'contact_emaill' => '联系人邮箱',
            'orgnize' => '组织者类型',
            'orgnize_name' => '组织者名称',
            'apply_money' => '报名费',
            'event_img' => '赛事宣传图',
            'user_id' => '发布者id',
            'is_end' => '是否结束',
            'wenzhang' => '赛事内容',
            'jianjie' => '简介',
            'is_top' => '是否置顶',
            'detailed' => '详细地址',
            'begin' => '比赛开始时间',
            'collocation' => '托管',
            'people' => '比赛队伍数',
            'leixing' => '比赛分组类型',
            'family' => '是否启用家庭组报名',
        ];
    }

    /**
     * get方法集 begin
     * @author ning
     */

    /**
     * 返回赛事类型
     */
    public function getEventType(){
        $data = EventType::find()->all();
        return ArrayHelper::toArray($data);
    }

    /**
     * 返回赛事举办组织类型
     */
    public function getOrgnaizes(){
        $data = Organizes::find()->all();
        return ArrayHelper::toArray($data);
    }

    /**
     * @ 获取赛事类型对应的模版
     * @return mixed
     */

    public function getTemplate($id){
        $data = Template::find()->where(['event_type_id'=> $id])->all();
        $array = ArrayHelper::toArray($data);

        $options = '';

        foreach($array as $value){
            $options .= "<option value='".$value['id']."'>".$value['temp_file_name']."</option>";
        }

        return $options;
    }

        /**
     * @ 获取已定义的字段
     * @ return mixed
     */

    public function getCreateSelf($id){
        $query = new Query();
        $query->select('field_name')
            ->distinct()
            ->from('bm_add_field')
            ->where(['event_id'=>$id])
            ->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        return $rows;
    }


    /**
     * @ 获取下拉列表数据
     * @ return array
     */
    public function getFieldType(){
        $query = new Query();
        $query->select ('*')
            ->from('bm_field_type')
            ->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        return $rows;
    }

   /**
     * @ 获取报名人数
     * @ return bool
     */
    public function getNumber()
    {
        return $this->hasOne(TeamApplyInfo::className(), ['event_id' => 'id'])->count();
    }
    /**
     * @获取赛事类型
     */
    public function getType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type']);
    }

    /**
     * get 方法集 end
     */

    /**
     * @获取赛事状态
     */
    public function getState()
    {
        return $this->hasOne(EventState::className(), ['is_end' => 'is_end']);
    }
}
