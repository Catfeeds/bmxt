<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseTeamEvent */

$this->title = '赛事: ' . ' ' . $model->event_name;
$this->params['breadcrumbs'][] = ['label' => '未审核赛事', 'url' => ['unaddit']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = '审核';
?>
<div class="relese-team-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
