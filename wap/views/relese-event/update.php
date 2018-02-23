<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEvent */

$this->title = '修改赛事: ' . ' ' . $model->event_name;
$this->params['breadcrumbs'][] = ['label' => '发布赛事', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="relese-event-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form_update', [
        'model' => $model,'eventType' => $eventType,'organize' => $organize,
    ]) ?>

</div>
