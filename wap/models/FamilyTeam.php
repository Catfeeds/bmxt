<?php
/**
 * 文件名 : FamilyTeam.php
 * ============================================================================

 * 网站地址: http://www.yijianshen.net；
 * ============================================================================
 * $Author: Dawn.S $
 * $Id: FamilyTeam.php  2015/11/13 $
*/
namespace frontend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "{{%family_team}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $family_team_id
 * @property string $family_team_name
 * @property string $family_team_num
 * @property string $family_team_content
 */
class FamilyTeam extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%family_team}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'family_team_id', 'family_team_name', 'family_team_num', 'family_team_content'], 'required'],
            [['user_id',  'family_team_num'], 'integer'],
            [['family_team_id', 'family_team_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户id',
            'family_team_id' => '家庭组报名id',
            'family_team_name' => '家庭组队名称',
            'family_team_num' => '家庭组队次序',
            'family_team_content' => '家庭组队成员',
        ];
    }

    /**
     * 返回家庭组报名id
     * @return string
     */
    public function getFamilyId($user_id){
        $query = new Query();
        $query->select('family_team_id')
            ->distinct()
            ->from('bm_family_team')
            ->where(['user_id'=>$user_id])
            ->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();

         if(count($rows,1) == 0){
            $family_team_id = 'f110';
            return $family_team_id;
         }else{
             $key = array_search(max($rows),$rows);

             $family_team_id = (string)$rows[$key]['family_team_id'];
             $family_team_id = substr($family_team_id,1) + 1;
             $family_team_id = 'f' . $family_team_id;

            return $family_team_id;
         }

    }
}
