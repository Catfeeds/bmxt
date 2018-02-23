<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ZDReleseEvent */

$this->title = 'Create Zdrelese Event';
$this->params['breadcrumbs'][] = ['label' => 'Zdrelese Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zdrelese-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
