<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relese-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_name')->label('赛事名称')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_type')->label('赛事种类')->dropDownList(\yii\helpers\ArrayHelper::map($data,'id','event_type_name'),array('class'=> 'form-control','empty'=>array('0'=>'请选择类别'))) ?>

    <?= $form->field($model, 'apply_time_start')->label('比赛开始时间')->widget(DatePicker::className([
        'value' => '2004-10-10',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'orientation' => 'top right',
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]))?>

    <?= $form->field($model, 'apply_time_end')->label('比赛结束时间')?>

    <?= $form->field($model, 'place')->label('比赛地点')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->label('联系地点')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->label('联系手机')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_emaill')->label('联系邮箱')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgnize')->label('举办者类型')->textInput() ?>

    <?= $form->field($model, 'orgnize_name')->label('举办者名称')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model,'is_extends')->label('是否采用扩展模版')->checkbox()?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>