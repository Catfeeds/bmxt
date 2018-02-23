<?php

namespace frontend\models;

use Yii;
use backend\models\EventType;
use backend\models\Template;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use frontend\models\ApplyInfo;
/**
 * This is the model class for table "{{%relese_event}}".
 *
 * @property integer $id
 * @property string $event_name
 * @property integer $addit
 * @property integer $event_type
 * @property integer $apply_time_start
 * @property integer $apply_time_end
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
 */
class ReleseEvent extends \backend\backbase\BaseActiveRecord
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
            [['addit', 'event_type', 'contact_phone', 'orgnize', 'extend_id', 'is_extends', 'user_id', 'is_end'], 'integer'],
            [['event_type', 'apply_time_start', 'apply_time_end', 'contact_phone', 'orgnize', 'extend_id', 'user_id', 'is_end', 'wenzhang'], 'required'],
            [['apply_money'], 'number'],
            [['wenzhang'], 'string'],
            [['event_name', 'place', 'contact_name', 'contact_emaill', 'orgnize_name'], 'string', 'max' => 60],
            [['apply_time_start', 'apply_time_end'], 'string', 'max' => 100],
            [['event_img'], 'string', 'max' => 255]
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
            'contact_name' => '赛事发布联系人',
            'contact_phone' => '联系人手机号',
            'contact_emaill' => '联系邮箱',
            'orgnize' => '组织类型',
            'orgnize_name' => '组织名称',
            'extend_id' => '扩展字段',
            'is_extends' => '是否扩展',
            'apply_money' => '报名费',
            'event_img' => '赛事宣传图',
            'user_id' => '发布用户id',
            'is_end' => '是否结束',
            'wenzhang' => '文章上传',
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


}
