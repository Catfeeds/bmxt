<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\relese */


$this->title = '发布赛事';
$this->params['breadcrumbs'][] = ['label' => 'Relese', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


