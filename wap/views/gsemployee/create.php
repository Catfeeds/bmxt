<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Gsemployee */

$this->title = '添加员工信息';
//$this->params['breadcrumbs'][] = ['label' => 'Gsemployees', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gsemployee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'gs_id'=>$gs_id,
    ]) ?>

</div>
