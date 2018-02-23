<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LunboImg */

$this->title = '上传新轮播图';
$this->params['breadcrumbs'][] = ['label' => '轮播图', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lunbo-img-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>

</div>
