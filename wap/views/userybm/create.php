<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Userybm */

$this->title = 'Create Userybm';
$this->params['breadcrumbs'][] = ['label' => 'Userybms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userybm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
