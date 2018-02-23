<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Leixing */

$this->title = 'Update Leixing: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leixings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leixing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
