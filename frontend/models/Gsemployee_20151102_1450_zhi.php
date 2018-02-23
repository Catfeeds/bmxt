<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%gsemployee}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $gs_id
 * @property string $phone
 * @property string $sex
 * @property string $id_card
 */
class Gsemployee extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gsemployee}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'gs_id', 'phone', 'sex', 'id_card'], 'required'],
            [['gs_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 11],
            [['sex'], 'string', 'max' => 4],
            [['id_card'], 'string', 'max' => 18]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ID',
            'name' => '姓名',
            'gs_id' => '公司',
            'phone' => '手机',
            'sex' => '性别',
            'id_card' => '身份证',
        ];
    }
}
