<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'status')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'telphone')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'reg_time')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'birthday')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'quanxian')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
