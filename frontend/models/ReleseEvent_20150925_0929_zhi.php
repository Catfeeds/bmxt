<?php

namespace frontend\models;

use Yii;
use frontend\models\EventType;
use frontend\models\Template;
use yii\helpers\ArrayHelper;
use yii\db\Query;


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
            [['addit', 'event_type', 'contact_phone', 'orgnize', 'extend_id', 'is_extends', 'user_id', 'is_end'], 'integer'],
            [['event_type', 'apply_time_start', 'apply_time_end', 'contact_phone', 'orgnize', 'extend_id', 'user_id', 'is_end'], 'required'],
            [['apply_money'], 'number'],
            [['event_name', 'place', 'contact_name', 'contact_emaill', 'orgnize_name', 'event_img'], 'string', 'max' => 60],
            [['apply_time_start', 'apply_time_end'], 'string', 'max' => 100]
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
            'is_extends' => 'Is Extends',
            'apply_money' => 'Apply Money',
            'event_img' => 'Event Img',
            'user_id' => 'User ID',
            'is_end' => 'Is End',
        ];
    }

    /**
     * @ 获取赛事类型
     * @return mixed
     */

    public function getEventType(){

        return EventType::find()->all();
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

}
