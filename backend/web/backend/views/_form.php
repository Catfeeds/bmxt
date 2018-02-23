<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relese-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addit')->textInput() ?>

    <?= $form->field($model, 'event_type')->textInput() ?>

    <?= $form->field($model, 'apply_time_start')->textInput() ?>

    <?= $form->field($model, 'apply_time_end')->textInput() ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->textInput() ?>

    <?= $form->field($model, 'contact_emaill')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgnize')->textInput() ?>

    <?= $form->field($model, 'orgnize_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extend_id')->textInput() ?>

    <?= $form->field($model, 'is_extends')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
