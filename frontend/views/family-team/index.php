<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '家庭组';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-team-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新建家庭组', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'family_team_id',
            'family_team_name',
            'family_team_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
