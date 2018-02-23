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



    <?= $form->field($model, 'apply_time_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apply_time_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place')->dropDownList([1=>'济南市',2=>'青岛市',3=>'淄博市']) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_emaill')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'orgnize_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apply_money')->textInput() ?>

    <?= $form->field($model, 'event_img')->textInput(['maxlength' => true]) ?>
    <a class="btn btn-success" href="http://www.51first.cn<?php echo '/'.$model->event_img;?>"  target="_blank"/>预览</a>



    <?= $form->field($model, 'is_end')->dropDownList([0=>'否',1=>'是']) ?>

    <?= $form->field($model, 'wenzhang')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jianjie')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'detailed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collocation')->dropDownList([0=>'否',1=>'是']) ?>

    <?= $form->field($model, 'people')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leixing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addit')->dropDownList([0=>'否',1=>'是']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '确定', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
