<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ReleseTeamEvent */

$this->title = '发布团队赛事';
$this->params['breadcrumbs'][] = ['label' => '发布团队赛事', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-team-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'eventType' => $eventType,'organize' => $organize,
    ]) ?>

</div>
