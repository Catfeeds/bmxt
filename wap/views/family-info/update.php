<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FamilyInfo */

?>
<div style="height: 100px"></div>
<div class="family-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
