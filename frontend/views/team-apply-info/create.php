<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ApplyInfo */

$this->title = 'Create Apply Info';
$this->params['breadcrumbs'][] = ['label' => 'Apply Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apply-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
