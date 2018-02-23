<?php

$this->registerCssFile('css/form.css');


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

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true])->label('赛事名称') ?>

    <?= $form->field($model, 'addit')->dropDownList([0=>'未审核',1=>'通过审核'])->label('审核状态') ?>

    <?= $form->field($model, 'event_type')->dropDownList(\yii\helpers\ArrayHelper::map($eventType,'id','event_type_name'))->label('赛事类型') ?>

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
    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ->label('赛事地点')?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true])->label('赛事联系人') ?>

    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true])->label('联系人电话') ?>

    <?= $form->field($model, 'contact_emaill')->textInput(['maxlength' => true])->label('联系人邮箱') ?>

    <?= $form->field($model, 'orgnize')->dropDownList(\yii\helpers\ArrayHelper::map($organize,'id','organize'))->label('赛事组织者类型') ?>

    <?= $form->field($model, 'orgnize_name')->textInput(['maxlength' => true]) ->label('赛事组织者')?>

    <?= $form->field($model, 'extend_id')->textInput() ->label('自定义报名项')?>


    <?= $form->field($model, 'is_extends')->dropDownList([0=>'否',1=>'是'])->label('是否使用自定义报名项') ?>
    <?= $form->field($model, 'event_img')->fileInput() ->label('赛事宣传图片')?>
    <?= $form->field($model, 'apply_money')->textInput() ->label('报名费用')?>
    <?= $form->field($model, 'is_end')->dropDownList([0=>'否',1=>'是'])->label('赛事状态') ?>
    <?= $form->field($model,'wenzhang')->textarea(['id'=>'newstext1','class' => 'zbc'])->label('赛事信息') ?>

    <?php echo Ueditor::widget(['id'=>'newstext1',]); ?>
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(' ') ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '我要提交' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'de_btn1']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div style="margin-bottom:50px;">

</div>

<script>
    var de_label=document.getElementsByClassName("control-label");
    var de_input=document.getElementsByClassName("form-control");
    var de_date=document.getElementsByClassName("input-group");
    var de_con=document.getElementsByClassName("input-group-addon");

    for(i=0;i<de_label.length;i++){
        de_label[i].style.width="200px";
        de_label[i].style.textAlign="right";
    };

    de_label[16].style.float="left";
    de_label[16].style.marginRight="5px";



    for(i=0;i<de_input.length;i++){
        de_input[i].style.display="inline-block";
        de_input[i].style.width="800px";
    };

    for(i=0;i<de_date.length;i++){
        de_date[i].style.display="inline-block";
    };
    for(i=0;i<de_con.length;i++){
        de_con[i].style.display="inline-block";
        de_con[i].style.position="relative";
        de_con[i].style.zIndex="99";
        de_con[i].style.right="90px";
        de_con[i].style.top="3px";
        de_con[i].style.width="45px";
    };

    var de_img=document.getElementById("releseevent-event_img");
    de_img.style.display="inline-block";

    var de_txtbox=document.getElementById("newstext1");
    de_txtbox.style.display="inline-block";
    de_txtbox.style.width="800px";

    var de_btn1=document.getElementById("de_btn1");
    de_btn1.style.marginLeft="920px";
    de_btn1.style.marginBottom="20px";


    var de_div=document.getElementsByClassName("relese-event-create");
    var de_title=de_div[0].getElementsByTagName("h1");
    de_title[0].innerHTML="赛事发布页面";
    de_title[0].style.padding="60px 0px 20px 450px";
    de_title[0].style.marginTop="0px";

    de_div[0].style.background="#eeeeee";

    var de_url=document.getElementsByClassName("breadcrumb");
    de_url[0].style.display="none";

    var de_help=document.getElementsByClassName("help-block");
    for(i=0;i<de_help.length;i++){
        de_help[i].style.marginLeft="210px";
    };


 //   alert(1);
</script>
