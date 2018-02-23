<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%img}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $img
 * @property string $content
 */
class Img extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['title', 'img'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'img' => 'Img',
            'content' => 'Content',
        ];
    }
}
