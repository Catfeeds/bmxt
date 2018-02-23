<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LunboImg */

$this->title = '添加新合作商';
$this->params['breadcrumbs'][] = ['label' => '合作商管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lunbo-img-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>

</div>
