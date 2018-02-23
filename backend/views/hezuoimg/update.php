<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LunboImg */

$this->title = '修改路径: ' . ' ' . $model->img;
$this->params['breadcrumbs'][] = ['label' => '轮播图', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '路径';
?>
<div class="lunbo-img-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
