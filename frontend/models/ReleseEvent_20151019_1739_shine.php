<?php

namespace frontend\models;

use Yii;
use frontend\models\EventType;
use frontend\models\Template;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use frontend\models\ApplyInfo;
use frontend\models\Organizes;
/**
 * This is the model class for table "{{%relese_event}}".
 *
 * @property integer $id
 * @property string $event_name
 * @property integer $addit
 * @property integer $event_type
 * @property string $apply_time_start
 * @property string $apply_time_end
 * @property string $place
 * @property string $contact_name
 * @property integer $contact_phone
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
 * @property boolean $is_top
 * @property string $detailed
 * @property string $begin
 */
class ReleseEvent extends \frontend\frontbase\BaseActiveRecord
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
            [['addit', 'event_type','place', 'orgnize','is_extends','apply_money', 'user_id', 'is_end'], 'integer'],
            [[ 'orgnize_name','apply_money','contact_name','contact_phone','contact_emaill','event_type','event_name', 'apply_time_start', 'apply_time_end', 'contact_phone', 'orgnize', 'extend_id', 'user_id', 'is_end', 'wenzhang','jianjie','detailed','begin'], 'required'],
            [['contact_phone','apply_money'], 'number'],
            [['contact_phone',],'match','pattern' => '/13[0123456789]{1}\d{8}|14[57]\d{8}|15[012356789]\d{8}|18[0123456789]\d{8}/'],
            [['apply_time_start','apply_time_end','event_name','orgnize_name','contact_name','event_name','wenzhang','jianjie','detailed'], 'string'],
            [['contact_emaill',],'email'],
            [['event_name', 'place', 'contact_name', 'contact_emaill', 'orgnize_name'], 'string', 'max' => 60],
            [['apply_time_start', 'apply_time_end','begin'], 'string', 'max' => 100],
            ['event_img','file','extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 1024*1024*1024],
            [['jianjie'],'string']
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
            'begin' => '比赛开始时间',
            'place' => '地点',
            'detailed' => '详细地址',
            'contact_name' => '赛事发布联系人',
            'contact_phone' => '联系人手机号',
            'contact_emaill' => '联系邮箱',
            'orgnize' => '组织类型',
            'orgnize_name' => '组织名称',
            'is_extends' => '是否设置自定义组别',
            'apply_money' => '报名费',
            'event_img' => '赛事宣传图',
            'user_id' => '发布用户id',
            'is_end' => '是否结束',
            'wenzhang' => '文章上传',
            'jianjie' => '赛事简介',

        ];
    }
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
     * @ 写入用户自定义选项
     * @ return bool
     */
    public function SetField(array $post){
        $field_name = $post['field_name'];
        $field_type = $post['field_type'];
        $field_content = $post['field_content'];
        $event_id = $post['event_id'];
        $extends_name = $post['extends_name'];

        //写入bm_template;
        $connection = Yii::$app->db;
        //判断 field_type确定是否为多选
        switch($field_type){
            //单行文本
            case 1 :
                $command = $connection->createCommand()->insert('bm_add_field',[
                    'field_name'=> $field_name,
                    'event_id'=> $event_id,
                    'extends_name' => $extends_name,
                    'field_type' => $field_type,
                ])->execute();
                break;
            //日期
            case 2 :
                $command = $connection->createCommand()->insert('bm_add_field',[
                    'field_name'=> $field_name,
                    'field_type' => $field_type,
                    'field_content' => $field_content,
                    'event_id'=> $event_id,
                    'extends_name' => $extends_name,
                ])->execute();
                break;
            //邮箱
            case 3 :
                $command = $connection->createCommand()->insert('bm_add_field',[
                    'field_name'=> $field_name,
                    'field_type' => $field_type,
                    'field_content' => $field_content,
                    'event_id'=> $event_id,
                    'extends_name' => $extends_name,
                ])->execute();
                break;
            //多选
            default:
                $array = explode(",",$field_content);
                $len = count($array);

                for($i=0;$i<$len;$i++){
                    $command = $connection->createCommand()->insert('bm_add_field',[
                        'field_name'=> $field_name,
                        'field_type' => $field_type,
                        'field_content' => $array[$i],
                        'event_id'=> $event_id,
                        'extends_name' => $extends_name,
                    ])->execute();
                }
                break;
        }

        //添加到模版
        $command = $connection->createCommand()->insert('bm_template',[
            'temp_file_name' => $extends_name,
            'temp_file_value' => $field_name,
            'event_type_id' => $event_id,
        ])->execute();

        /*
        //修改bm_extends_field表结构
        $query = new Query();
        $query->select ($extends_name)
            ->from('bm_extends_field')
            ->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        if($rows == false){
            return '添加成功！';
        }else{
            $connection->createCommand()->addColumn('bm_extends_field',$extends_name,'varchar(255)')->execute();
        }
        */
        return '添加成功！';
    }
    /**
     * @ 获取报名人数
     * @ return bool
     */
    public function getNumber()
    {
        return $this->hasOne(ApplyInfo::className(), ['event_id' => 'id'])->count();
    }
    /**
     * @获取赛事类型
     */
    public function getType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type']);
    }


}
