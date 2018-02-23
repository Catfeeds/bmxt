<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%extends_field}}".
 *
 * @property integer $id
 * @property string $extends1
 * @property string $extends2
 * @property string $extends3
 * @property string $extends4
 * @property string $extends5
 * @property string $extends6
 * @property string $extends7
 * @property string $extends8
 * @property string $extends9
 * @property string $extends10
 * @property string $extends11
 * @property string $extends12
 * @property string $extends13
 * @property string $extends14
 * @property string $extends15
 * @property string $extends16
 * @property string $extends17
 * @property string $extends18
 * @property string $extends19
 * @property string $extends20
 * @property string $extends21
 * @property string $extends22
 * @property string $extends23
 * @property string $extends24
 * @property string $extends25
 * @property string $extends26
 * @property string $extends27
 * @property string $extends28
 * @property string $extends29
 * @property string $extends30
 * @property integer $event_id
 */
class ExtendsField extends \frontend\frontbase\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%extends_field}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id'], 'required'],
            [['event_id'], 'integer'],
            [['extends1', 'extends2', 'extends3', 'extends4', 'extends5', 'extends6', 'extends7', 'extends8', 'extends9', 'extends10', 'extends11', 'extends12', 'extends13', 'extends14', 'extends15', 'extends16', 'extends17', 'extends18', 'extends19', 'extends20', 'extends21', 'extends22', 'extends23', 'extends24', 'extends25', 'extends26', 'extends27', 'extends28', 'extends29', 'extends30'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'extends1' => 'Extends1',
            'extends2' => 'Extends2',
            'extends3' => 'Extends3',
            'extends4' => 'Extends4',
            'extends5' => 'Extends5',
            'extends6' => 'Extends6',
            'extends7' => 'Extends7',
            'extends8' => 'Extends8',
            'extends9' => 'Extends9',
            'extends10' => 'Extends10',
            'extends11' => 'Extends11',
            'extends12' => 'Extends12',
            'extends13' => 'Extends13',
            'extends14' => 'Extends14',
            'extends15' => 'Extends15',
            'extends16' => 'Extends16',
            'extends17' => 'Extends17',
            'extends18' => 'Extends18',
            'extends19' => 'Extends19',
            'extends20' => 'Extends20',
            'extends21' => 'Extends21',
            'extends22' => 'Extends22',
            'extends23' => 'Extends23',
            'extends24' => 'Extends24',
            'extends25' => 'Extends25',
            'extends26' => 'Extends26',
            'extends27' => 'Extends27',
            'extends28' => 'Extends28',
            'extends29' => 'Extends29',
            'extends30' => 'Extends30',
            'event_id' => 'Event ID',
        ];
    }
}
