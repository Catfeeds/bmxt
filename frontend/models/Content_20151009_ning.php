<?php
/**
 * 文件名 : Content.php
 * ============================================================================

 * 网站地址: http://www.yijianshen.net；
 * ============================================================================
 * $Author: Dawn.S $
 * $Id: Content.php  2015/9/24 $
*/
namespace frontend\models;

use frontend\frontbase\BaseActiveRecord;
use yii\helpers\ArrayHelper;
use yii\db\Query;


class Content extends BaseActiveRecord{
    /**
     * 获取基本赛事项目设置
     */
    public function getEventBasicItems($event_id){
        $query = new Query();
        $query->select ('*')
            ->from('bm_relese_event')
            ->where(['id' => $event_id])
            ->all();
        $command = $query->createCommand();
        $rows = $command->queryOne();

        $array = array();
        $array['id'] = $rows['id'];
        $array['event_name'] = $rows['event_name'];
        $array['event_type'] = $this->getApplyInfo('bm_event_type','event_type_name',$rows['event_type']);
        $array['apply_time_start'] = $rows['apply_time_start'];
        $array['apply_time_end'] = $rows['apply_time_end'];
        $array['place'] = $rows['place'];
        $array['contact_name'] = $rows['contact_name'];
        $array['contact_phone'] = $rows['contact_phone'];
        $array['contact_email'] = $rows['contact_emaill'];
        $array['organize_type'] = $this->getApplyInfo('bm_organizes','organize',$rows['orgnize']);
        $array['organize_name'] = $rows['orgnize_name'];
        $array['event_img'] = $rows['event_img'];
        $array['apply_money'] = $rows['apply_money'];
        $array['wenzhang'] = $rows['wenzhang'];
        return $array;
    }
    /**
     * 转换自定义选项，返回表单
     * @param $event_id        赛事id
     * @return html code    返回html代码
     */
    public function toHtml($event_id){
        $query = new Query();

        $arr = $this->getFieldItem($event_id);
        $arr_lang = count($arr);

        $string = '';
        for($i= 0; $i<$arr_lang;$i++){
            $query->select('*')
                ->from('bm_add_field')
                ->where(['extends_name' => $arr[$i],'event_id' => $event_id])
                ->all();
            $command = $query->createCommand();
            $rows = $command->queryAll();

            //遍历生成html 返回
            $string_stem_radio = '';
            $string_stem_box = '';
            $string_stem_select = '';
            foreach($rows as $key => $val){
                switch($val['field_type']){
                    //单行文本框
                    case 1:
                        $string .= '<tr><td class="cell_l">'.$val['field_name'].'：</td><td class="cell_r"><input class="form-control" type="text" name="'.$val['extends_name'].'" placeholder="请输入相关信息"/></td></tr></br>';
                        break;
                    //日期选择框
                    case 2:
                        $string .= '<tr><td class="cell_l">'.$val['field_name'].'：</td><td class="cell_r"><input class="form-control" type="text" name="'.$val['extends_name'].'" placeholder="请输入相关信息" /></td></tr></br>';

                        break;
                    //邮箱输入框
                    case 3:
                        $string .= '<tr><td class="cell_l">'.$val['field_name'].'：</td><td class="cell_r"><input class="form-control" type="text" name="'.$val['extends_name'].'" placeholder="请输入相关信息"/></td></tr></br>';
                        break;
                    //单选输入框
                    case 4:
                        $string_pre_radio = '<tr><td class="cell_l">'.$val['field_name'].'：</td><td class="cell_r">';
                        $string_suf_radio = '</td></tr>';
                        $string_stem_radio .= '<label class="radio-inline"><input type="radio" name="'.$val['extends_name'].'" value="'.$val['field_value'].'"/>'.$val['field_content'].'</label>';
                        break;
                    //多选输入框
                    case 5:
                        $string_pre_box = '<tr><td class="cell_l">'.$val['field_name'].'：</td><td class="cell_r">';
                        $string_suf_box = '</td></tr>';
                        $string_stem_box .= '<label class="checkbox-inline"><input type="checkbox" name="'.$val['extends_name'].'" value="'.$val['field_value'].'"/>'.$val['field_content'].'</label>';
                        break;
                    //下拉输入框
                    default:
                        $string_pre_select = '<tr><td class="cell_l">'.$val['field_name'].'：</td><td class="cell_r"><select class="form-control" name="'.$val['extends_name'].'">';
                        $string_suf_select = '</select></td></tr>';
                        $string_stem_select .= ' <option value="'.$val['field_value'].'">'.$val['field_content'].'</option>';
                        break;
                }
            }
            if($string_stem_radio){
                $string .= $string_pre_radio.$string_stem_radio.$string_suf_radio;
            }
            if($string_stem_box){
                $string .= $string_pre_box.$string_stem_box.$string_suf_box;
            }
            if($string_stem_select){
                $string .= $string_pre_select.$string_stem_select.$string_suf_select;
            }
        }
        return $string;
    }


    /**
     * 处理用户报名申请
     * $param $handle  array
     */
    public function handle($handle){
        $array = array();
        $extends = array();
        foreach($handle as $key => $val){
            if(preg_match("/^([a-z])+\d/",$key)){
                $extends[$key] = trim($val);
            }else{
                $array[$key] = $val;
            }

        }
        $string = '';
        foreach($extends as $key => $val){
            $string .= $key.'=>'.$val;
        }
        $connection = \Yii::$app->db;
        $connection -> createCommand()->insert('bm_apply_info',[
            'user_id' => $array['Info']['user_id'],
            'enent_name' => $array['Info']['event_name'],
            'apply_status' =>'1',
            'is_end' => '0',
            'event_id' => $array['Info']['bm_project'],
            'apply_user' => $array['Info']['user_id'],
            'apply_money' => '0'
        ])->execute();
        $connection ->createCommand()->insert('bm_extends_field',[
            'extends1' => $extends['extends1']
        ])->execute();
        $info = '添加成功';
        return $info;
        //return $handle;
    }

    /**
     * 获取基本配置信息
     * @param $table_name   表名
     * @param $field_name   字段名
     * @param $value        字段值
     * @return   名称
     */
     protected  function getApplyInfo($table_name,$field_name,$value){
         $query = new Query();
         $query->select("$field_name")
             -> from("$table_name")
             ->where(['id' => $value])
             ->all();
         $command = $query->createCommand();
         $rows = $command->queryOne();
         return $rows[$field_name];
     }

    /**
     * 获取选项组名，并生成html
     * @param $event_id
     * @return 返回包含extends_name的一维数组
     */
    protected  function getFieldItem($event_id){
        $query = new Query();
        $query->select('extends_name')
            ->distinct()
            -> from('bm_add_field')
            -> where(['event_id' => $event_id])
            ->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();

        $arr = array();
        foreach($rows as $key => $val){
            if(is_array($val)){
                foreach($val as $k => $v){
                    $arr[] = $v;
                }
            }
        }
        return $arr;
    }



}