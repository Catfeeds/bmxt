<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEvent */

$this->title = '发布赛事';
$this->params['breadcrumbs'][] = ['label' => '发布赛事', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="relese-event-create">
    <?= $this->render('_form', [
        'model' => $model,'eventType' => $eventType,'organize' => $organize,
    ]) ?>

</div>
