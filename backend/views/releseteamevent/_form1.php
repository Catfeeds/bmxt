<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\ReleseTeamEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relese-team-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addit')->textInput() ?>

    <?= $form->field($model, 'event_type')->textInput() ?>

    <?= $form->field($model, 'apply_time_start')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'apply_time_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_emaill')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgnize')->textInput() ?>

    <?= $form->field($model, 'orgnize_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apply_money')->textInput() ?>

    <?= $form->field($model, 'event_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'is_end')->textInput() ?>

    <?= $form->field($model, 'wenzhang')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jianjie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_top')->textInput() ?>

    <?= $form->field($model, 'detailed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collocation')->textInput() ?>

    <?= $form->field($model, 'people')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leixing')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
