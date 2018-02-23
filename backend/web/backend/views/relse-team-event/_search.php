<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseTeamEventSerch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relese-team-event-search">

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

    <?php // echo $form->field($model, 'apply_money') ?>

    <?php // echo $form->field($model, 'event_img') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'is_end') ?>

    <?php // echo $form->field($model, 'wenzhang') ?>

    <?php // echo $form->field($model, 'jianjie') ?>

    <?php // echo $form->field($model, 'is_top') ?>

    <?php // echo $form->field($model, 'detailed') ?>

    <?php // echo $form->field($model, 'begin') ?>

    <?php // echo $form->field($model, 'collocation') ?>

    <?php // echo $form->field($model, 'people') ?>

    <?php // echo $form->field($model, 'leixing') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
