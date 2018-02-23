<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quanxian')->dropDownList([0=>'无',1=>'有']) ?>

    <?= $form->field($model, 'xitong')->dropDownList([0=>'无',1=>'有'])?>

    <?= $form->field($model, 'yonghu')->dropDownList([0=>'无',1=>'有']) ?>

    <?= $form->field($model, 'caiwu')->dropDownList([0=>'无',1=>'有'])?>

    <?= $form->field($model, 'guanggao')->dropDownList([0=>'无',1=>'有']) ?>

    <?= $form->field($model, 'tupian')->dropDownList([0=>'无',1=>'有']) ?>

    <?= $form->field($model, 'wenzhang')->dropDownList([0=>'无',1=>'有']) ?>

    <?= $form->field($model, 'saishi')->dropDownList([0=>'无',1=>'有']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
