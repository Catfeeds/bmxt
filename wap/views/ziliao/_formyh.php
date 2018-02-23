<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile('css/form.css');
$cssString='
body {
    margin: 0px;
    background: transparent url("images/bg1.jpg") no-repeat scroll 0% 0% / 100% 100%;
}
.user-update {
    margin:auto;
    width: 30%;
}
.form-control {
    display: block;
    width: 100%;
    height: 30px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857;
    color: #555;
    background-color: #FFF;
    background-image: none;
    border: 1px solid #CCC;
    border-radius: 4px;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
}';
$this->registerCss($cssString);
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('机构名') ?>



    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xingming')->textInput()->label('联系人') ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('联系电话') ?>

    <?= $form->field($model, 'dizhi')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
