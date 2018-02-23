<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '报名比赛';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>
        <?/*= Html::a('发布赛事', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'event_name',
            'addit',
            'event_type',
            'apply_time_start',
            // 'apply_time_end:datetime',
            // 'place',
            // 'contact_name',
            // 'contact_phone',
            // 'contact_emaill:email',
            // 'orgnize',
            // 'orgnize_name',
            // 'extend_id',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

