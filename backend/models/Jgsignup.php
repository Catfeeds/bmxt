<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%jgsignup}}".
 *
 * @property integer $id
 * @property string $jgname
 * @property string $dizhi
 * @property string $jguser
 * @property string $phone
 * @property string $email
 * @property string $img
 * @property string $sffpzh
 * @property string $fpzhmm
 * @property string $user_id
 */
class Jgsignup extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%jgsignup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jgname', 'dizhi', 'jguser', 'phone', 'email', 'img', 'sffpzh', 'fpzhmm','user_id'], 'required'],
            [['jgname'], 'string', 'max' => 60],
            [['dizhi', 'img', 'sffpzh' ,'user_id',], 'string', 'max' => 255],
            [['jguser'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 30],
            [['fpzhmm'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jgname' => '机构名称',
            'dizhi' => '机构地址',
            'jguser' => '机构联系人',
            'phone' => '联系电话',
            'email' => '邮箱',
            'img' => '图片',
            'sffpzh' => '分配账号',
            'fpzhmm' => '分配密码',
            'user_id' => '分配用户id',
        ];
    }
}
