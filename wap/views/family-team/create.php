<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\FamilyTeam */
?>
<div style="height: 100px"></div>
<div class="family-team-create center-block" style="width: 600px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'family_apply_id' => $family_apply_id,
    ]) ?>

</div>
