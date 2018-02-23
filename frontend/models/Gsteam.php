<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%gsteam}}".
 *
 * @property integer $id
 * @property integer $gs_id
 * @property string $gsname
 * @property string $gsteam
 * @property string $team_id
 */
class Gsteam extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gsteam}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gs_id', 'gsname', 'gsteam', 'team_id'], 'required'],
            [['gs_id'], 'integer'],
            [['gsname', 'gsteam'], 'string', 'max' => 255],
            [['team_id'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gs_id' => 'Gs ID',
            'gsname' => 'Gsname',
            'gsteam' => 'Gsteam',
            'team_id' => 'Team ID',
        ];
    }
}
