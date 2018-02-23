<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEvent */

$this->title = 'Create Relese Event';
$this->params['breadcrumbs'][] = ['label' => 'Relese Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
