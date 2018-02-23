<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReleseEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '对账';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'event_name',
            'addit',
            [
                'label'=>'赛事类型',
                'format'=>'raw',
                'value' => function($model){
                    $type=$model->type->event_type_name;

                    return $type;
                }
            ],
            'apply_time_start',
            'apply_money',
            [
                'label'=>'报名人数',
                'format'=>'raw',
                'value' => function($model){
                    $id=$model->id;
                    $userid=Yii::$app->user->id;
                    $url = "index.php?r=apply-info/index&event_id=".$id."&user_id=".$userid;
                    return Html::a($model->number, $url);
                }
            ],
            ['attribute'=>'收入','value'=>function($model){
                $money=$model->apply_money;
                $number=$model->number;
                return $money*$number
                    ;}],
            // 'apply_time_end',
            // 'place',
            // 'contact_name',
            // 'contact_phone',
            // 'contact_emaill:email',
            // 'orgnize',
            // 'orgnize_name',
            // 'extend_id',
            // 'is_extends',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
