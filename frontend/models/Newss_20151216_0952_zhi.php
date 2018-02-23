<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%newss}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $newss
 * @property string $user_id
 */
class Newss extends \frontend\frontbase\BaseActiveRecord
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
            [['name', 'newss', 'user_id'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['newss'], 'string', 'max' => 10000],
            [['user_id'], 'string', 'max' => 255]
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
            'newss' => 'Newss',
            'user_id' => 'User ID',
        ];
    }
}
