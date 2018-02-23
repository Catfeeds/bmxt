<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%lunbo_img}}".
 *
 * @property integer $id
 * @property string $img
 * @property string $url
 */
class LunboImg extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lunbo_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img'], 'file'],
            [['url'],'string','max'=>255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => '首页轮播图',
            'url'=>'链接地址'
        ];
    }
}
