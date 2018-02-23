<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wenyuan\ueditor\Ueditor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Newss */
/* @var $form yii\widgets\ActiveForm */
$js=<<<JS
                        var editor;
                        KindEditor.ready(function(K) {
                                editor = K.create('#newsstext1', {
                                        allowFileManager : true
                                });
                        });
JS;
?>

<div class="newss-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'newss')->textarea(['id'=>'newsstext1','class' => 'zbc'])->label('文章编辑') ?>
    <?php echo Ueditor::widget(['id'=>'newsstext1',]); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '发布' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
