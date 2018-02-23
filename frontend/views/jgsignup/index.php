<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '机构注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jgsignup-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jgsignup', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jgname',
            'dizhi',
            'jguser',
            'phone',
            // 'email:email',
            // 'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
