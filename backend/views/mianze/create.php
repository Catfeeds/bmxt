<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Mianze */

$this->title = '编辑新免责声明';
$this->params['breadcrumbs'][] = ['label' => '免责声明', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mianze-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
