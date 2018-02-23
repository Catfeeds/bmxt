<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\shezhi */

$this->title = 'Create Shezhi';
$this->params['breadcrumbs'][] = ['label' => 'Shezhi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shezhi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
