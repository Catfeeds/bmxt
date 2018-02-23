<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%shezhi}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $friends_link
 * @property string $logo
 * @property string $daohang
 */
class Shezhi extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shezhi}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'daohang'], 'string', 'max' => 20],
            [['logo'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '网站名称',
            'logo' => 'Logo地址',
            'daohang' => '导航栏',
        ];
    }
    /**
     * @inheritdoc
     */
    public function getTitle($id)
    {
        return $this->title;
    }
}
