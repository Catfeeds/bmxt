<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

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
 * @property string $daima
 */
class Jgsignup extends \frontend\frontbase\BaseActiveRecord
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
            [['jgname', 'dizhi', 'jguser', 'phone', 'email', 'daima'], 'required'],
            [['jgname'], 'string', 'max' => 60],
            [['dizhi', 'daima'], 'string', 'max' => 255],
            [['img'], 'file'],
            [['jguser'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 11,'min' => 11],
            ['phone','match','pattern'=>'/^1[0-9]{10}$/','message'=>'{attribute}必须为1开头的11位纯数字'],
            ['phone', 'unique', 'targetClass' => '\frontend\models\Jgsignup', 'message' => '手机号已经注册过。'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\frontend\models\Jgsignup', 'message' => '此邮件地址已被占用。'],

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
            'dizhi' => '详细地址',
            'jguser' => '联系人',
            'phone' => '电话',
            'email' => '邮箱',
            'img' => '上传营业执照',
            'daima' => '请填写机构代码',
        ];
    }
}
