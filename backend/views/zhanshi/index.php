<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '发布方展示列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zhanshi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'img:ntext',
            'jianjie',
            'jieshao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
