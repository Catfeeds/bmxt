<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseTeamEvent */

$this->title = 'Update Relese Team Event: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Relese Team Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="relese-team-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
