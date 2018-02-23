<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use wenyuan\ueditor\Ueditor;
/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEvent */
/* @var $form yii\widgets\ActiveForm */


$js=<<<JS
                        var editor;
                        KindEditor.ready(function(K) {
                                editor = K.create('#newstext1', {
                                        allowFileManager : true
                                });
                        });
JS;
?>

<div class="relese-event-form">

    <?php $form = ActiveForm::begin([
        'id' => "relese-event-form",
        'enableAjaxValidation' => false,
        'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addit')->dropDownList([0=>'未审核',1=>'通过审核']) ?>

    <?= $form->field($model, 'event_type')->dropDownList(\yii\helpers\ArrayHelper::map($eventType,'id','event_type_name')) ?>

    <?= $form->field($model, 'apply_time_start')->textInput(['maxlength' => true])->widget(DatePicker::className([
        'value' => '2004-10-10',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'orientation' => 'top right',
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]))?>

    <?= $form->field($model, 'apply_time_end')->textInput(['maxlength' => true])->widget(DatePicker::className([
        'value' => '2004-10-10',
        'pluginOptions' => [
            'orientation' => 'top right',
            'format' => 'Y-m-d',
            'autoclose' => true,
        ]
    ]))?>
    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_emaill')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgnize')->dropDownList(\yii\helpers\ArrayHelper::map($organize,'id','organize')) ?>

    <?= $form->field($model, 'orgnize_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extend_id')->textInput() ?>


    <?= $form->field($model, 'is_extends')->dropDownList([0=>'否',1=>'是']) ?>
    <?= $form->field($model, 'event_img')->fileInput() ?>
    <?= $form->field($model, 'apply_money')->textInput() ?>
    <?= $form->field($model, 'is_end')->dropDownList([0=>'否',1=>'是']) ?>
    <?= $form->field($model,'jianjie')->textInput()->label('赛事简介') ?>
    <?= $form->field($model,'wenzhang')->textarea(['id'=>'newstext1','class' => 'zbc'])->label('赛事编辑') ?>

    <?php echo Ueditor::widget(['id'=>'newstext1',]); ?>
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(' ') ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


