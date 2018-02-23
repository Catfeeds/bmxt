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
/* @var $model backend\models\ReleseTeamEvent */
/* @var $form yii\widgets\ActiveForm */
?>
<h2 class="text-center" style="margin:40px 0px 20px;">团&nbsp;队&nbsp;赛&nbsp;事&nbsp;发&nbsp;布</h2>
<div class="relese-team-event-form center-block" style="width: 600px;">

    <?php $form = ActiveForm::begin([
        'id' => "relese-event-form",
        'enableAjaxValidation' => false,
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <input type="hidden" name="ReleseTeamEvent[addit]" value="0">

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
    ])?>

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
    ])) ?>

    <?= $form->field($model, 'begin')->textInput(['maxlength' => true])->widget(DatePicker::className([
        'value' => '2004-10-10',
        'pluginOptions' => [
            'orientation' => 'top right',
            'format' => 'Ymd',
            'autoclose' => true,
        ]
    ])) ?>

    <?= $form->field($model, 'place')->dropDownList([1=>'济南市',2=>'青岛市',3=>'淄博市'])?>

    <?= $form->field($model, 'people')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collocation')->dropDownList([0=>'否',1=>'是']) ?>

    <ul class="row" style="list-style-type: none;">托管说明
        <li>1、本公司拥有多年的赛事运营经验，可提供赛事托管服务。</li>
        <li>2、如需托管请填写赛事对接人员的姓名、手机号、邮箱。</li>
        <li>3、如不需赛事托管服务，请填写下面的发布人信息。</li>
    </ul>

    <?= $form->field($model, 'leixing')->textarea(['maxlength' => 255])?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_emaill')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgnize')->dropDownList([1=>'民间',2=>'企业',3=>'政府',4=>'公益']) ?>

    <?= $form->field($model, 'orgnize_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'apply_money')->textInput() ?>

    <?= $form->field($model, 'event_img')->fileInput() ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(' ') ?>

    <input type="hidden" class="form-control" name="ReleseTeamEvent[is_end]" value="0"/>

    <?= $form->field($model, 'jianjie')->textarea(['id'=>'jianjie'])->label('赛事简介（限80字以内，含标点符号）') ?>

    <?= $form->field($model,'wenzhang')->textarea(['id'=>'newstext1','class' => 'zbc'])->label('赛事详细信息') ?>
    <?php echo Ueditor::widget(['id'=>'newstext1',]); ?>

    <input type="hidden" class="form-control" name="ReleseTeamEvent[is_top]" value="0"/>

    <div style="clear: both; height: 50px;"></div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '点击发布团队赛事' : '点击确认修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    document.getElementsByTagName("h1")[0].style.display="none";
</script>