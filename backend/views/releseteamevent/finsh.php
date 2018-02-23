<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '已结束赛事';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-team-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('发布新赛事', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'event_name',

            [
                'attribute'=>'addit',
                'value'=>function ($model){
                    return $model->addit===1?'是':'否';
                }
            ],
//            'event_type',
            'apply_time_start',
            'apply_time_end',
            [
                'attribute'=>'place',
                'value'=>function ($model){
                    if($model->place==1){
                        return "济南市";
                    }elseif($model->place==2){
                        return "青岛市";
                    }elseif($model->place==3){
                        return "淄博市";
                    }else{
                        return "潍坊市";
                    }
                }
            ],
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
