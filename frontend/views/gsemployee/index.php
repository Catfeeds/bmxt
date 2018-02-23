<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '员工信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gsemployee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('上传新员工信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'name',

            'phone',
            'sex',
            // 'id_card',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
