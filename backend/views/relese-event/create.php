<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEvent */

$this->title = '发布赛事';
$this->params['breadcrumbs'][] = ['label' => '赛事管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'eventType' => $eventType,'organize' => $organize,
    ]) ?>

</div>
