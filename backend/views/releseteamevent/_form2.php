<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use wenyuan\ueditor\Ueditor;
/* @var $this yii\web\View */
/* @var $model backend\models\ReleseTeamEvent */
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

<div class="relese-event-form center-block" style="width: 800px;">

    <?php $form = ActiveForm::begin([
        'id' => "relese-event-form",
        'enableAjaxValidation' => false,
        'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'event_img')->fileInput() ?>
    <?= $form->field($model, 'apply_money')->textInput() ?>


    <?= $form->field($model, 'event_type')->dropDownList([
        1=>'马拉松',
        2=>'路跑',
        3=>'越野跑',
        4=>'自行车',
        5=>'铁人三项',
        6=>'户外运动',
        7=>'滑雪',
        8=>'篮球',
        9=>'足球',
        10=>'高尔夫',
        11=>'羽毛球',
        12=>'网球',
        13=>'乒乓球',
        14=>'桌球',
        15=>'游泳',
        16=>'越野跑',
        17=>'休闲体育',
        18=>'其它'
    ]) ?>

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
    <?= $form->field($model, 'begin')->textInput(['maxlength' => true])->widget(DatePicker::className([
        'value' => '2004-10-10',
        'pluginOptions' => [
            'orientation' => 'top right',
            'format' => 'Y-m-d',
            'autoclose' => true,
        ]
    ]))?>
    <?= $form->field($model, 'place')->dropDownList([1=>'济南市',2=>'青岛市',3=>'淄博市']) ?>
    <?= $form->field($model, 'detailed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_emaill')->textInput(['maxlength' => true]) ?>

    <!--    --><?//= $form->field($model, 'orgnize')->dropDownList(\yii\helpers\ArrayHelper::map($organize,'id','organize')) ?>

    <?= $form->field($model, 'orgnize_name')->textInput(['maxlength' => true]) ?>

    <input id="releseevent-extend_id" class="form-control" name="ReleseEvent[extend_id]" type="hidden" value="0"/>
    <?= $form->field($model,'jianjie')->textInput()->label('赛事简介') ?>
    <?= $form->field($model,'wenzhang')->textarea(['id'=>'newstext1','class' => 'zbc'])->label('赛事编辑') ?>

    <?php echo Ueditor::widget(['id'=>'newstext1',]); ?>

    <!--    --><?//= $form->field($model, 'is_extends')->dropDownList([0=>'否',1=>'是']) ?>

    <?= $form->field($model, 'is_end')->dropDownList([0=>'否',1=>'是']) ?>

    <?= $form->field($model, 'addit')->dropDownList([0=>'未审核',1=>'通过审核']) ?>


    <!--    --><?//= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(' ') ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


