<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Gsemployee */

$this->title = '修改员工: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '所有员工', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];

?>
<div class="gsemployee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'gs_id' =>$gs_id,
    ]) ?>

</div>
