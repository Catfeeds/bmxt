<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Newss */

$this->title = '将修改的新闻: ' . ' ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Newss', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="newss-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
