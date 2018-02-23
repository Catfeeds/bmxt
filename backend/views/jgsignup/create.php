<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Jgsignup */

$this->title = 'Create Jgsignup';
$this->params['breadcrumbs'][] = ['label' => 'Jgsignups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jgsignup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
