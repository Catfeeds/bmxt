<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ReleseTeamEvent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Relese Team Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-team-event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'event_name',
            'addit',
            'event_type',
            'apply_time_start',
            'apply_time_end',
            'place',
            'contact_name',
            'contact_phone',
            'contact_emaill:email',
            'orgnize',
            'orgnize_name',
            'apply_money',
            'event_img',
            'user_id',
            'is_end',
            'wenzhang:ntext',
            'jianjie',
            'is_top',
            'detailed',
            'begin',
            'collocation',
            'people',
        ],
    ]) ?>

</div>