<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ReleseTeamEvent */

$this->title = $model->event_name;
?>
<div class="relese-team-event-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'family',
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