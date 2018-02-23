<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%zhanshi}}".
 *
 * @property integer $id
 * @property string $jianjie
 * @property string $name
 * @property string $img
 * @property string $jieshao
 */
class Zhanshi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zhanshi}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jianjie','jieshao','name'], 'string'],
            [['jianjie','jieshao','name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jianjie' => '简介',
            'name'=>'机构名',
            'img' => '图片',
            'jieshao' => '介绍',
        ];
    }
}
