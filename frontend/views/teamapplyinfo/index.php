<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Team Applyinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-applyinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Team Applyinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'event_name',
            'apply_status',
            'is_end',
            // 'event_id',
            // 'apply_team_id',
            // 'apply_money',
            // 'id_affirm',
            // 'position',
            // 'is_paid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
