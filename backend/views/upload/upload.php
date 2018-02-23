<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file')->fileInput() ?>
图片大小请保持1600*400，宽度1600px；高度400px；

    <button>上传</button>

<?php ActiveForm::end() ?>
