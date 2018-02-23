<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shezhi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'title',
            'logo',
            'daohang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
