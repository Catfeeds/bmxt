<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReleseEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Relese Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Relese Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'event_name',
            'addit',
            'event_type',
            'apply_time_start:datetime',
            // 'apply_time_end:datetime',
            // 'place',
            // 'contact_name',
            // 'contact_phone',
            // 'contact_emaill:email',
            // 'orgnize',
            // 'orgnize_name',
            // 'extend_id',
            // 'is_extends',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
