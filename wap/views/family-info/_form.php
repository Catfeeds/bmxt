<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FamilyInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="family-info-form">

    <?php $form = ActiveForm::begin(); ?>

<input id="familyinfo-user_id" class="form-control" name="FamilyInfo[user_id]" type="hidden" value="<?= \Yii::$app->user->identity->id; ?>">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->dropDownList([0=>'女',1=>'男'])?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_card')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '完成创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
