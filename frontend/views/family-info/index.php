<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '成员信息列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加成员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'name',
            'sex',
            'age',
            // 'id_card',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
