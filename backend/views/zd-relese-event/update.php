<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ZdReleseEvent */

$this->title = '将要修改的赛事: ' . ' ' . $model->event_name;
//$this->params['breadcrumbs'][] = ['label' => 'Zd Relese Events', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="zd-relese-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
