<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TeamApplyinfo */

$this->title = 'Create Team Applyinfo';
$this->params['breadcrumbs'][] = ['label' => 'Team Applyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-applyinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
