<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%mianze}}".
 *
 * @property integer $id
 * @property string $mianze
 */
class Mianze extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mianze}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mianze'], 'required'],
            [['id'], 'integer'],
            [['mianze'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mianze' => '免责声明',
        ];
    }
}
