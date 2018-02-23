<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Zhanshi */

$this->title = '更新发布方信息: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '发布方信息列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'name' => $model->name]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="zhanshi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
