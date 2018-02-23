<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Relese Team Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-team-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Relese Team Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'event_name',
            'addit',
            'event_type',
            'apply_time_start',
            // 'apply_time_end',
            // 'place',
            // 'contact_name',
            // 'contact_phone',
            // 'contact_emaill:email',
            // 'orgnize',
            // 'orgnize_name',
            // 'apply_money',
            // 'event_img',
            // 'user_id',
            // 'is_end',
            // 'wenzhang:ntext',
            // 'jianjie',
            // 'is_top',
            // 'detailed',
            // 'begin',
            // 'collocation',
            // 'people',
            // 'leixing',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
