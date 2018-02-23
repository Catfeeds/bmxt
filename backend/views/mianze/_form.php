<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wenyuan\ueditor\Ueditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Mianze */
/* @var $form yii\widgets\ActiveForm */
$js=<<<JS
                        var editor;
                        KindEditor.ready(function(K) {
                                editor = K.create('#newstext1', {
                                        allowFileManager : true
                                });
                        });
JS;
?>

<div class="mianze-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model,'mianze')->textarea(['id'=>'newstext1','class' => 'zbc'])->label('免责声明编辑') ?>
    <?php echo Ueditor::widget(['id'=>'newstext1',]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '发布' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
