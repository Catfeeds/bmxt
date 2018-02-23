<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jgsignup */

$this->title = '分配账号: ' . ' ' . $model->jgname;
$this->params['breadcrumbs'][] = ['label' => '机构用户', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '分配';
?>
<div class="jgsignup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
