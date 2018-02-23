<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%mianze}}".
 *
 * @property integer $id
 * @property string $mianze
 */
class Mianze extends \frontend\frontbase\BaseActiveRecord
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
            'mianze' => 'Mianze',
        ];
    }
}
