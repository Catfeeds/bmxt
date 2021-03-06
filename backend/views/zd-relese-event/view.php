<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ZdReleseEvent */

$this->title = $model->event_name;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zd-relese-event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'event_name',
//            'addit',
//            'event_type',
//            'apply_time_start',
//            'apply_time_end',
//            'place',
//            'contact_name',
//            'contact_phone',
//            'contact_emaill:email',
//            'orgnize',
//            'orgnize_name',
//            'extend_id',
//            'is_extends',
//            'apply_money',
//            'event_img',
//            'user_id',
//            'is_end',
//            'wenzhang:ntext',
//            'jianjie',
            'is_top',
//            'detailed',
//            'begin',
        ],
    ]) ?>

</div>
