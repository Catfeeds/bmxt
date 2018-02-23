<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <input type="hidden" name="Team[builder_id]" value="<?php echo Yii::$app->user->id ?>">

    <input type="hidden" name="Team[member_id]" value="<?php echo Yii::$app->user->id ?>">

    <?php
    $connection = Yii::$app->db;
    $sql = "SELECT COUNT(DISTINCT team_id) FROM bm_team";
    $command = $connection->createCommand($sql)->queryColumn();
    //var_dump($command[0]);
    $com=$command[0]+1;
    $team_id='t'.$com;

    ?>

    <input type="hidden" name="Team[team_id]" value="<?php echo $team_id ?>">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
