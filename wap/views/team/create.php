<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Team */

$this->title = '创建团队';

?>
<div class="team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
