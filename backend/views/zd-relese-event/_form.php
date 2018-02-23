<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ZdReleseEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zd-relese-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_top')->dropDownList([0=>'否',1=>'是']) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '发布' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
