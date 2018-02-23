<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ReleseTeamEvent */

$this->title = 'Create Relese Team Event';
$this->params['breadcrumbs'][] = ['label' => 'Relese Team Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-team-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
