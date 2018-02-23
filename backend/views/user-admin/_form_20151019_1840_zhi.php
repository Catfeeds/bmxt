<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quanxian')->textInput() ?>

    <?= $form->field($model, 'xitong')->textInput() ?>

    <?= $form->field($model, 'yonghu')->textInput() ?>

    <?= $form->field($model, 'caiwu')->textInput() ?>

    <?= $form->field($model, 'guanggao')->textInput() ?>

    <?= $form->field($model, 'tupian')->textInput() ?>

    <?= $form->field($model, 'wenzhang')->textInput() ?>

    <?= $form->field($model, 'saishi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
