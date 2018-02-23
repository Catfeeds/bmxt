<?php
/**
 * 文件名 : TeamContent.php
 * ============================================================================

 * 网站地址: http://www.yijianshen.net；
 * ============================================================================
 * $Author: Dawn.S $
 * $Id: Content.php  2015/11/06 $
*/
namespace frontend\models;

use frontend\frontbase\BaseActiveRecord;
use frontend\models\ReleseTeamEvent;
use yii\helpers\ArrayHelper;
use yii\db\Query;


class TeamContent extends BaseActiveRecord{
    /**
     * 获取基本赛事项目设置
     */
    public function getEventBasicItems($event_id){
        $query = new Query();
        $query->select ('*')
            ->from('bm_relese_team_event')
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
        $array['begin'] = $rows['begin'];//小智
        return $array;
    }

    /**
     * 处理用户报名申请
     * $param $handle  array
     */
    public function handle($handle){

        if($handle['TeamApplyInfo']['user_id']==0){
            $info = array();
            $info['msg'] = 0;
            return $info;
        }else{
            $apply_team_id = (string)$handle['TeamApplyInfo']['apply_team_id'];
            $tof = $this->checkTeamId($apply_team_id);
            if($tof == 'true'){
                $connection = \Yii::$app->db;
                $connection -> createCommand()->insert('bm_team_apply_info',[
                    'user_id' => $handle['TeamApplyInfo']['user_id'],
                    'event_name' => $handle['TeamApplyInfo']['event_name'],
                    'apply_status' =>'1',
                    'is_end' => '0',
                    'event_id' => $handle['TeamApplyInfo']['bm_project'],
                    'apply_team_id' =>$handle['TeamApplyInfo']['apply_team_id'],
                    'apply_money' => $handle['TeamApplyInfo']['apply_money'],
                    'leixing' => $handle['TeamApplyInfo']['leixing'],
                ])->execute();

                $info = array();
                $info['apply_id'] = \Yii::$app->db->getLastInsertID();

                $info['info'] = '添加成功';
                $info['id'] = $handle['TeamApplyInfo']['bm_project'];
                $info['apply_money'] = $handle['TeamApplyInfo']['apply_money'];
                $info['msg'] = 1;
                return $info;
            }else{
                $info = array();
                $info['info'] = '请添加正确的团队ID！';
                $info['id'] = $handle['TeamApplyInfo']['bm_project'];
                $info['msg'] = 2;
                return $info;
            }

        }

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

    /**
     * 验证团队id
     *@param $string
     *@return boolean
     */
    protected function checkTeamId($string){

        $apply_team_id = $string;
        $id_pre = strtolower(substr($apply_team_id,0,1) );
        $id_num = (int)substr($apply_team_id,1);

        if($id_pre == 't'){
            $query = new Query();
            $query->select ('*')
                ->from('bm_team')
                ->where(['team_id' => $id_pre.$id_num])
                ->all();
            $command = $query->createCommand();
            $rows = $command->queryOne();

            if($rows){
                return 'true';
            }else{
                return 'false';
            }
        }elseif($id_pre == 'c'){
                            $query = new Query();
                $query->select ('*')
                    ->from('bm_gsteam')
                    ->where(['team_id' => $id_pre.$id_num])
                    ->all();
                $command = $query->createCommand();
                $rows = $command->queryOne();

                if($rows){
                    return 'true';
                }else{
                    return 'false';
                }
        }
        elseif($id_pre == 'f'){
                                    $query = new Query();
                        $query->select ('*')
                            ->from('bm_family_team')
                            ->where(['family_team_id' => $id_pre.$id_num])
                            ->all();
                        $command = $query->createCommand();
                        $rows = $command->queryOne();

                        if($rows){
                            return 'true';
                        }else{
                            return 'false';
                        }
                }
        else{
            return 'false';
        }
    }

}