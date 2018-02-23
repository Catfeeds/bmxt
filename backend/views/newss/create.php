<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Newss */

$this->title = '文章发布';
$this->params['breadcrumbs'][] = ['label' => 'Newss', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newss-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
