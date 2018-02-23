<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Zhanshi */

$this->title = '填写发布方展示信息';
$this->params['breadcrumbs'][] = ['label' => '发布方展示列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zhanshi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
