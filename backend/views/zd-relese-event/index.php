<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '赛事置顶';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zd-relese-event-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'event_name',
//            'addit',
//            'event_type',
//            'apply_time_start',
            // 'apply_time_end',
            // 'place',
            // 'contact_name',
            // 'contact_phone',
            // 'contact_emaill:email',
            // 'orgnize',
            // 'orgnize_name',
            // 'extend_id',
            // 'is_extends',
            // 'apply_money',
            // 'event_img',
            // 'user_id',
            // 'is_end',
            // 'wenzhang:ntext',
            // 'jianjie',

            [
                'attribute'=>'is_top',
                'value'=>function ($model){
                    return $model->is_top===1?'是':'否';
                }
            ],
            // 'detailed',
            // 'begin',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}&nbsp;&nbsp;{update}'],
        ],
    ]); ?>

</div>
