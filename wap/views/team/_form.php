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
    $sql = "SELECT DISTINCT team_id FROM bm_team";
    //$sql = "SELECT max(team_id) FROM bm_team";
    $command = $connection->createCommand($sql)->queryColumn();
    //var_dump($command[0]);
    $arrr = array();
    foreach($command as $k){
        $number = substr($k,1);
        //$arrr[]= $k->member_id;
        $arrr[] = intval($number,10);
    }
    $key = array_search(max($arrr),$arrr);
    $str=$arrr[$key];
    //$str1 = substr($str,1);
    $com=$str+1;
    $team_id='t'.$com;
//var_dump($team_id);
    ?>

    <input type="hidden" name="Team[team_id]" value="<?php echo $team_id ?>">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
