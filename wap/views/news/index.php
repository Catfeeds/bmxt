<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '所有新闻';

?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//小智            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'news',

            ['class' => 'yii\grid\ActionColumn',/*小智*/'template' => '{view}'],
        ],
    ]); ?>

</div>
