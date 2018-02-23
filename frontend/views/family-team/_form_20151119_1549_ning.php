<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\FamilyTeam;

/* @var $this yii\web\View */
/* @var $model frontend\models\FamilyTeam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="family-team-form">
<?php
    $user_id = \Yii::$app->user->identity->id;
    $team = FamilyTeam::find()->where(['user_id'=>$user_id,]);
    $team_num = $team
    ->count();


?>
    <?php $form = ActiveForm::begin(); ?>

    <input id="familyteam-user_id" class="form-control" name="FamilyTeam[user_id]" type="hidden" value="<?= \Yii::$app->user->identity->id;?>">

<input id="familyteam-family_team_id" class="form-control" name="FamilyTeam[family_team_id]" value="<?= 'f'.$user_id.($team_num+1);?>" type="hidden">

    <?= $form->field($model, 'family_team_name')->textInput(['maxlength' => true]) ?>

    <input id="familyteam-family_team_num" class="form-control" name="FamilyTeam[family_team_num]" type="hidden"  value="<?= ($team_num+1)?>">



    <?= $form->field($model, 'family_team_content')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
