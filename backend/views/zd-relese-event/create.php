<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ZdReleseEvent */

$this->title = 'Create Zd Relese Event';
$this->params['breadcrumbs'][] = ['label' => 'Zd Relese Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zd-relese-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
