<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property integer $id
 * @property string $banner
 */
class Banner extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['banner'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'banner' => 'Banner',
        ];
    }
}
