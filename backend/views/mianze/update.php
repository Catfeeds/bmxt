<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mianze */

$this->title = '修改免责条款: ';
$this->params['breadcrumbs'][] = ['label' => '免责声明', 'url' => ['index']];

$this->params['breadcrumbs'][] = '修改';
?>
<div class="mianze-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
