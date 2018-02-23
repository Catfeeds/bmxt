<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use wenyuan\ueditor\Ueditor;
//页内css shine_20151023
$cssString="
    body{
        background:url(/images/multi_back.png) no-repeat ;
        background-attachment:fixed;
        filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')';
        -moz-background-size:100% 100%;
        background-size:100% 100%;
    }
    .breadcrumb{
        display:none;
    }
    .btn-success{
        float:right;
        margin:-40px 0px 30px;
    }
    #jianjie{
        height:60px;
    }

";
$this->registerCss($cssString);

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
<h2 class="text-center" style="margin:40px 0px 20px;">个&nbsp;人&nbsp;赛&nbsp;事&nbsp;发&nbsp;布</h2>
<div class="relese-event-form center-block" style="width: 600px;">

    <?php $form = ActiveForm::begin([
        'id' => "relese-event-form",
        'enableAjaxValidation' => false,
        'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <input type="hidden" name="ReleseEvent[addit]" value="0">
    <?= $form->field($model, 'event_type')->dropDownList(\yii\helpers\ArrayHelper::map($eventType,'id','event_type_name')) ?>

    <?= $form->field($model, 'apply_time_start')->textInput(['maxlength' => true])->widget(DatePicker::className([
        'value' => '2004-10-10',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'orientation' => 'top right',
            'format' => 'Ymd',
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
            'format' => 'Ymd',
            'autoclose' => true,
        ]
    ]))?>
    <?= $form->field($model, 'place')->dropDownList([1=>'济南市',2=>'青岛市',3=>'淄博市'])?>
    <?= $form->field($model, 'people')->textInput(['maxlength' => true,'value' => 1000])?>
    <?= $form->field($model, 'detailed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collocation')->dropDownList([1=>'是',0=>'否']) ?>
                    <ul class="row" style="list-style-type: none;">托管说明
                        <li>1、本公司拥有一只具有多年的赛事运营经验的专业团队，可提供赛事托管服务。</li>
                </ul>
    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
    详细说明
    </button>
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">托管说明</h4>
                </div>
                <ul class="row" style="list-style-type: none;">托管说明
                        <li>1、本公司拥有一只具有多年赛事运营经验的专业团队，可提供赛事托管服务。</li>
                        <li>2、如需托管请填写赛事对接人员的姓名、手机号、邮箱。</li>
                        <li>3、如不需赛事托管服务，请填写下面的发布人信息。</li>
                </ul>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>


    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_emaill')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgnize')->dropDownList(\yii\helpers\ArrayHelper::map($organize,'id','organize')) ?>

    <?= $form->field($model, 'orgnize_name')->textInput(['maxlength' => true]) ?>

    <input id="releseevent-extend_id" class="form-control" name="ReleseEvent[extend_id]" type="hidden" value="0">
    <input type="hidden" class="form-control" name="ReleseEvent[is_end]" value="0"/>

    <?= $form->field($model, 'is_extends')->dropDownList([1=>'是',0=>'否']) ?>
    <?= $form->field($model, 'event_img')->fileInput() ?>
    <?= $form->field($model, 'apply_money')->textInput(['value'=>'0']) ?>
    <?= $form->field($model,'jianjie')->textarea(['id'=>'jianjie'])->label('赛事简介（限80字以内，含标点符号）') ?>
    <?= $form->field($model,'wenzhang')->textarea(['id'=>'newstext1','class' => 'zbc'])->label('赛事详细信息') ?>

    <?php echo Ueditor::widget(['id'=>'newstext1',]); ?>
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(' ') ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '点击发布赛事' : '点击确认修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!--<script>-->
<!--    document.getElementById("jianjie").=2;-->
<!--</script>-->
