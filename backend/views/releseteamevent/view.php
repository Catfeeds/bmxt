<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseTeamEvent */

$this->title = $model->event_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-team-event-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'event_name',
            'addit',
//            'event_type',
            'apply_time_start',
            'apply_time_end',
            'begin',
//            'place',
            'contact_name',
            'contact_phone',
            'contact_emaill:email',
//            'orgnize',
            'orgnize_name',
            'apply_money',
//            'event_img',
//            'user_id',
            'is_end',
            'wenzhang:ntext',
            'jianjie',
//            'is_top',
            'detailed',
            'collocation',
            'people',
//            'leixing',
        ],
    ]) ?>

</div>
