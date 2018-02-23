<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%newss}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $newss
 */
class Newss extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%newss}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'newss'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['newss'], 'string', 'max' => 10000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '标题',
            'newss' => '内容',
        ];
    }
}
