<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%hezuo_img}}".
 *
 * @property integer $id
 * @property string $img
 * @property string $url
 */
class HezuoImg extends \backend\backbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hezuo_img}}';
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
            'img' => '合作网站logo',
            'url'=>'地址链接'
        ];
    }
}
