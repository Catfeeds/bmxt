<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Mianze */

$this->title = 'Create Mianze';
$this->params['breadcrumbs'][] = ['label' => 'Mianzes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mianze-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
