<?php
/**
 * 文件名 : FamilyInfo.php
 * ============================================================================

 * 网站地址: http://www.yijianshen.net；
 * ============================================================================
 * $Author: Dawn.S $
 * $Id: FamilyInfo.php  2015/11/13 $
*/

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%family_info}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property integer $sex
 * @property string $age
 * @property string $id_card
 */
class FamilyInfo extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%family_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'sex', 'age', 'id_card'], 'required'],
            [['user_id', 'sex', 'age'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_card'], 'string', 'max' => 18]
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
            'name' => '姓名',
            'sex' => '性别',
            'age' => '年龄',
            'id_card' => '身份证号',
        ];
    }
}
