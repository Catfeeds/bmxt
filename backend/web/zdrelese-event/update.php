<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ZDReleseEvent */

$this->title = 'Update Zdrelese Event: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zdrelese Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zdrelese-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
