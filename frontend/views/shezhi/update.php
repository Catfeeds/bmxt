<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\shezhi */

$this->title = 'Update Shezhi: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Shezhis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shezhi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
