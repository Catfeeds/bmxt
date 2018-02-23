<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Leixing */

$this->title = 'Create Leixing';
$this->params['breadcrumbs'][] = ['label' => 'Leixings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leixing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
