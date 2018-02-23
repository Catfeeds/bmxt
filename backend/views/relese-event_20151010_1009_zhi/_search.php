<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relese-event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'event_name') ?>

    <?= $form->field($model, 'addit') ?>

    <?= $form->field($model, 'event_type') ?>

    <?= $form->field($model, 'apply_time_start') ?>

    <?php // echo $form->field($model, 'apply_time_end') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'contact_name') ?>

    <?php // echo $form->field($model, 'contact_phone') ?>

    <?php // echo $form->field($model, 'contact_emaill') ?>

    <?php // echo $form->field($model, 'orgnize') ?>

    <?php // echo $form->field($model, 'orgnize_name') ?>

    <?php // echo $form->field($model, 'extend_id') ?>

    <?php // echo $form->field($model, 'is_extends') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
